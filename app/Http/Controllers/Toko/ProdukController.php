<?php

namespace App\Http\Controllers\Toko;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Barang;
use App\Admin\Merek;
use App\Admin\Kategori;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;
use App\Toko\Gambar;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        parent::__construct();
        $this->sub_menu['m_url'] = 'produk';
    }
    public function index(Request $request)
    {
        $toko = session('toko_id');
        $produk = Barang::where('toko_id', $toko)->get();
        // $produk = Barang::all();
        if ($request->ajax()) {
            return datatables()->of($produk)
                ->addColumn('kategori', function ($s) {
                    return $s->kategori->name;
                })
                ->addColumn('merek', function ($s) {
                    return $s->merek->name;
                })
                ->addColumn('action', function ($produk) {
                    return view('admin.tempat._aksi', [
                        'view' => '/produk/' . $produk->slug . '',
                        'show' => '/toko/produk/' . $produk->id . '',
                        'detail' => 'Detail',
                        'class' => 'badge badge-primary',
                        'edit' => '/toko/produk/' . $produk->id . '/edit',
                        'delete' => '/toko/produk/' . $produk->id . '',
                    ]);
                })
                ->rawColumns(['user', 'kategori', 'action', 'merek'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('toko.produk.index', $this->sub_menu);
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
        return view('toko.produk.create', compact('kategori', 'merek'), $this->sub_menu);
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
            'name' => 'required|unique:barang',
            'harga' => 'required',
            'stok' => 'required',
            'berat' => 'required',
            'kategori' => 'required',
            'merek' => 'required',
            'isi' => 'required',
        ]);

        $produk = Barang::create([
            'name' => $request->name,
            'toko_id' => session('toko_id'),
            'kategori_id' => $request->kategori,
            'merek_id' => $request->merek,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'berat' => $request->berat,
            'isi' => $request->isi,
            'slug' => Str::slug($request->name),
        ]);
        $produk->save();


        Alert::success('Data Berhasil Di Tambahkan');
        return redirect('/toko/produk/' . $produk['id'] . '/edit ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $produk = Barang::findorfail($id);
        $gambar = Gambar::where('barang_id', $id)->get();
        return view('toko.produk.edit', compact('kategori', 'merek', 'produk', 'gambar'), $this->sub_menu);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produk = Barang::findorfail($id);
        $produk->delete();
        Alert::success('data Berhasil Di Hapus');
        return redirect()->back();
    }

    public function upload(Request $request, $id)
    {
        $request->validate(['name' => 'required']);
        $produk = Barang::where('id', $id)->firstOrfail();
        $name = Gambar::create([
            'name' => $request->name,
            'barang_id' => $produk->id
        ]);

        $request->file('name')->move('img/barang/', $request->file('name')->getClientOriginalName());
        $name->name = $request->file('name')->getClientOriginalName();
        $name->save();
        Alert::success('Gambar Berhasil Di tambahkan', 'Ingin Tambah Gambar Lagi');
        return redirect()->back();
    }
    public function delete($id)
    {
        $gambar = Gambar::findorfail($id);
        $gambar->delete();
        Alert::success('Gambar berhasil Di hapus');
        return redirect()->back();
    }
}
