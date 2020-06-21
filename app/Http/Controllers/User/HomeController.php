<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Barang;
use App\Toko\Gambar;
use Carbon\Carbon;
use App\User\Keranjang;
use App\User\Keranjang_detail;
use App\User\Pembeli;
use App\Toko\Toko;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    public function index()
    {
        $barang = Barang::orderBy('id', 'DESC')->take(8)->get();
        return view('user.home.index', compact('barang'));
    }
    public function tampilproduk($slug)
    {
        $baran = Barang::orderBy('id', 'DESC')->take(4)->get();
        $barang = Barang::where('slug', '=', $slug)->firstOrFail();
        $bara = Barang::where('slug', '=', $slug)->first();
        $gambar = Gambar::where('barang_id', $bara->id)->get();
        return view('user.home.tampilproduk', compact('barang', 'baran', 'gambar'));
    }
    public function pesan(Request $request, $id)
    {
        $barang = Barang::where('id', $id)->firstOrFail();
        $pembeli = session('id');
        $tanggal = Carbon::now();

        if ($request->jumlah_pesanan > $barang->stok) {
            Alert::warning('Coba Lagi', 'Jumlah Pesanan Melebihi Stok');
            return redirect()->back();
        }
        if ($request->jumlah_pesanan == 0) {
            Alert::warning('Coba Lagi', 'Jumlah Pesanan Minimal 1');
            return redirect()->back();
        }

        $cek_keranjang = Keranjang::where('pembeli_id', $pembeli)->where('status', 0)->first();
        if (empty($cek_keranjang)) {
            Keranjang::create([
                'pembeli_id' => $pembeli,
                'tanggal' => $tanggal,
                'status' => 0,
                'jumlah_harga' => 0,
            ]);
        }
        $keranjang_baru = Keranjang::where('pembeli_id', $pembeli)->where('status', 0)->first();
        $cek_keranjang_detail = Keranjang_detail::where('barang_id', $barang->id)->first();
        if (empty($cek_keranjang_detail)) {
            Keranjang_detail::create([
                'barang_id' => $barang->id,
                'toko_id' => $barang->toko_id,
                'keranjang_id' => $keranjang_baru->id,
                'jumlah' => $request->jumlah_pesanan,
                'jumlah_harga' => $barang->harga * $request->jumlah_pesanan,
                'berat_total' => $barang->berat * $request->jumlah_pesanan,
            ]);
        } else {
            $keranjang_detail = Keranjang_detail::where('barang_id', $barang->id)->first();
            $keranjang_detail->update([
                'jumlah' => $keranjang_detail->jumlah + $request->jumlah_pesanan,
                'jumlah_harga' => $keranjang_detail->jumlah_harga + $barang->harga * $request->jumlah_pesanan,
                'berat_total' => $keranjang_detail->berat_total + $barang->berat * $request->jumlah_pesanan,
            ]);
        }
        $keranjang = Keranjang::where('pembeli_id', $pembeli)->where('status', 0)->first();
        $keranjang->update([
            'jumlah_harga' => $keranjang->jumlah_harga + $barang->harga * $request->jumlah_pesanan
        ]);

        Alert::success('Coba Lihat Keranjang Anda', 'Produk Sudah Masuk Keranjang');
        return redirect('cek_out');
    }
}
