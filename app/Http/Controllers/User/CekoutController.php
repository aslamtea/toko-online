<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User\Keranjang;
use App\User\Keranjang_detail;
use App\Admin\Barang;
use App\Admin\Province;
use App\User\Pesanan;
use Carbon\Carbon;
use App\User\Pesanan_detail;
use App\Admin\City;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;

class CekoutController extends Controller
{
    public function index()
    {
        $pembeli = session('id');
        $keranjang = Keranjang::where('pembeli_id', $pembeli)->where('status', 0)->first();
        if (empty($keranjang)) {
            Alert::warning('Anda Belum Memesan Apapun');
            return redirect()->back();
        }
        $detail = Keranjang_detail::where('keranjang_id', $keranjang->id)->get();
        return view('user.cek_out.index', compact('keranjang', 'detail'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'jumlah' => 'required|numeric'
        ]);
        $pembeli = session('id');
        $detail = Keranjang_detail::where('id', $id)->first();
        $barang = Barang::where('id', $detail->barang_id)->first();
        $kera = Keranjang::where('id', $detail->keranjang_id)->where('pembeli_id', $pembeli)->first();
        if ($request->jumlah > $barang->stok) {
            Alert::warning('Coba Lagi', 'Jumlah Pesanan Melebihi Stok');
            return redirect()->back();
        }
        if ($request->jumlah == 0) {
            Alert::warning('Coba Lagi', 'Jumlah Pesanan Minimal 1');
            return redirect()->back();
        }
        $kera->update([
            'jumlah_harga' => $kera->jumlah_harga - $detail->jumlah_harga
        ]);

        $detail->update([
            'jumlah' => $request->jumlah,
            'jumlah_harga' => $barang->harga * $request->jumlah,
            'berat_total' => $barang->berat * $request->jumlah,
        ]);
        $keranjang = Keranjang::where('id', $detail->keranjang_id)->where('pembeli_id', $pembeli)->first();
        $keranjang->update([
            'jumlah_harga' => $keranjang->jumlah_harga + $detail->jumlah_harga
        ]);
        Alert::success('data Sudah Dirubah ', 'Total Pesanan Anda ' . $keranjang->jumlah_harga . '');
        return redirect()->back();
    }
    public function delete($id)
    {
        $detail = Keranjang_detail::where('id', $id)->firstOrFail();
        $keranjang = Keranjang::where('id', $detail->keranjang_id)->firstOrFail();
        $keranjang->update([
            'jumlah_harga' => $keranjang->jumlah_harga - $detail->jumlah_harga
        ]);
        $detail->delete();
        Alert::warning('Darta ges Lengit');
        return redirect()->back();
    }
    public function pesan()
    {
        $pembeli = session('id');
        $provinces = Province::all();
        $keranjang = Keranjang::where('pembeli_id', $pembeli)->firstOrFail();
        return view('user.cek_out.pesan', compact('keranjang', 'provinces'));
    }
    public function simpan(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'no_telepon' => 'required',
            'alamat' => 'required',
            'origin' => 'required',
            'courier' => 'required',
            'bank' => 'required',
            'rekening' => 'required',
            'pemilik' => 'required',
        ]);

        $pembeli = session('id');
        $tanggal = Carbon::now();
        $keranjang = Keranjang::where('pembeli_id', $pembeli)->where('status', 0)->first();
        $keranjang_id = $keranjang->id;
        $keranjang_details = Keranjang_detail::where('keranjang_id', $keranjang_id)->get();

        $pesan = Pesanan::create([
            'pembeli_id' => $pembeli,
            'nama_lengkap' => $request->nama_lengkap,
            'no_telepon' => $request->no_telepon,
            'alamat' => $request->alamat,
            'kurir' => $request->courier,
            'jumlah_harga' => $keranjang->jumlah_harga,
            'tanggal' => $tanggal,
            'status' => 0,
            'keterangan' => $request->keterangan,
        ]);

        $pesan->save();

        foreach ($keranjang_details as $detail) {
            // dd($detail->berat_total);
            $response  = Http::asForm()->withHeaders([
                'key' => '35d76cc2082051fe822726a638c3a374'
            ])->post('https://api.rajaongkir.com/starter/cost', [
                // 'origin' => 4,
                // 'destination' => 5,
                // 'weight' => 1000,
                // 'courier' => $request->courier,
                'origin' => $detail->barang->toko->city_id,
                'destination' => $request->origin,
                'weight' => $detail->berat_total,
                'courier' => $request->courier,
            ]);

            Pesanan_detail::create([
                'barang_id' => $detail->barang_id,
                'pesanan_id' => $pesan['id'],
                'keranjang_detail' => $detail->id,
                'jumlah' => $detail->jumlah,
                'ongkir' => 0,
                'waktu_kirim' => 0,
                'berat_total' => $detail->berat_total,
                'jumlah_harga' => $detail->jumlah_harga,
                'total_harga' => $detail->jumlah_harga + 0,
            ]);
            $ko =  $response['rajaongkir']['results'][0]['costs'][1];
            dd($ko);
            foreach ($ko as $key) {
                $p_detail = Pesanan_detail::where('keranjang_detail', $detail->id)->first;
                $p_detail->update([
                    'ongkir' =>  $key['cost'][0]['value'],
                    'waktu_kirim' =>  $key['cost'][0]['etd'],
                    'total_harga' => $p_detail->jumlah_harga + $key['cost'][0]['value'],
                ]);
            }
        }
        $pesanan =  Pesanan::where('pembeli_id', $pembeli)->first();
        $P_detail = Pesanan_detail::where('pesanan_id', $pesanan->id);

        $pesanan->update([
            'jumlah_harga' => $P_detail->sum('total_harga')
        ]);

        return redirect()->back();


        // foreach ($keranjang_details as $keranjang_detail) {
        //     $barang = Barang::where('id', $keranjang_detail->barang_id)->first();
        //     $barang->update([
        //         'stok' => $barang->stok - $keranjang_detail->jumlah
        //     ]);
        // }
    }
}
