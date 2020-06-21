<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Barang;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use App\Admin\Kategori;
use App\Admin\Merek;
use App\Admin\Province;
use App\Admin\City;

class BarangController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->sub_menu['name'] = 'Management bisnis';
        $this->sub_menu['m_url'] = 'Barang';
    }


    public function index(Request $request)
    {
        $barang = Barang::all();
        if ($request->ajax()) {
            return datatables()->of($barang)
                ->addColumn('user', function ($s) {
                    return $s->user->name;
                })
                ->addColumn('kategori', function ($s) {
                    return $s->kategori->name;
                })
                ->addColumn('merek', function ($s) {
                    return $s->merek->name;
                })
                ->addColumn('action', function ($barang) {
                    return view('admin.tempat._aksi', [
                        'view' => '/produk/' . $barang->slug . '',
                        'show' => '/admin/barang/' . $barang->id . '',
                        'detail' => 'Detail',
                        'class' => 'badge badge-primary',
                        'edit' => '/admin/barang/' . $barang->id . '/edit',
                        'delete' => '/admin/barang/' . $barang->id . '',
                    ]);
                })
                ->rawColumns(['user', 'kategori', 'action', 'merek'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.barang.index', compact('barang'), $this->sub_menu);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = kategori::all();
        $merek = Merek::all();
        $provinces = Province::all();
        return view('admin.barang.create', compact('kategori', 'merek', 'provinces'), $this->sub_menu);
    }
    public function getCitiesAjax($id)
    {
        $cities = City::where('province_id', '=', $id)->pluck('city_name', 'id');

        return json_encode($cities);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'gambar_1' => 'required',
            'gambar_2' => 'required',
            'gambar_3' => 'required',
            'origin' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'berat' => 'required',
            'kategori' => 'required',
            'merek' => 'required',
            'isi' => 'required',
        ]);



        $barang = Barang::create([
            'name' => $request->name,
            'user_id' => auth()->user()->id,
            'gambar_1' => $request->gambar_1,
            'gambar_2' => $request->gambar_2,
            'gambar_3' => $request->gambar_3,
            'kota' => $request->origin,
            'kategori_id' => $request->kategori,
            'merek_id' => $request->merek,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'berat' => $request->berat,
            'isi' => $request->isi,
            'slug' => Str::slug($request->name),
        ]);
        $request->file('gambar_1')->move('img/barang/', $request->file('gambar_1')->getClientOriginalName());
        $barang->gambar_1 = $request->file('gambar_1')->getClientOriginalName();
        $request->file('gambar_2')->move('img/barang/', $request->file('gambar_2')->getClientOriginalName());
        $barang->gambar_2 = $request->file('gambar_2')->getClientOriginalName();
        $request->file('gambar_3')->move('img/barang/', $request->file('gambar_3')->getClientOriginalName());
        $barang->gambar_3 = $request->file('gambar_3')->getClientOriginalName();
        $barang->save();

        Alert::success('Data Berhasil Di Tambahkan');
        return redirect('/admin/barang');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $merek = Merek::all();
        $barang = Barang::findorfail($id);
        return view('admin.barang.show', compact('merek', 'barang'), $this->sub_menu);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = kategori::all();
        $merek = Merek::all();
        $barang = Barang::findorfail($id);
        $provinces = Province::all();
        $city = City::all();
        return view('admin.barang.edit', compact('kategori', 'merek', 'barang', 'provinces', 'city'), $this->sub_menu);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'origin' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'berat' => 'required',
            'kategori' => 'required',
            'merek' => 'required',
            'isi' => 'required',
        ]);
        $barang = Barang::findorfail($id);
        $barang->update([
            'name' => $request->name,
            'user_id' => auth()->user()->id,
            'gambar_1' => $request->gambar_1,
            'gambar_2' => $request->gambar_2,
            'gambar_3' => $request->gambar_3,
            'kota' => $request->origin,
            'kategori_id' => $request->kategori,
            'merek_id' => $request->merek,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'berat' => $request->berat,
            'isi' => $request->isi,
            'slug' => Str::slug($request->name),
        ]);
        $request->file('gambar_1')->move('img/barang/', $request->file('gambar_1')->getClientOriginalName());
        $barang->gambar_1 = $request->file('gambar_1')->getClientOriginalName();
        $request->file('gambar_2')->move('img/barang/', $request->file('gambar_2')->getClientOriginalName());
        $barang->gambar_2 = $request->file('gambar_2')->getClientOriginalName();
        $request->file('gambar_3')->move('img/barang/', $request->file('gambar_3')->getClientOriginalName());
        $barang->gambar_3 = $request->file('gambar_3')->getClientOriginalName();
        $barang->save();

        Alert::success('Data Berhasil Di Tambahkan');
        return redirect('/admin/barang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang = Barang::findorfail($id);
        $barang->delete();
        Alert::success('Data Berhasil Di Hapus');
        return redirect('/admin/barang');
    }
}
