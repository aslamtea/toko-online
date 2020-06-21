<?php

namespace App\Http\Controllers\Toko;

use App\Admin\Barang;
use App\Http\Controllers\Controller;
use App\User\Keranjang_detail;
use Illuminate\Http\Request;

class TokoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        parent::__construct();
        $this->sub_menu['m_url'] = 'keranjang';
    }

    public function keranjang(Request $request)
    {
        $toko = session('toko_id');
        $keranjang = Keranjang_detail::where('toko_id', $toko)->get();
        // $produk = Keranjang_detail::all();
        if ($request->ajax()) {
            return datatables()->of($keranjang)
                ->addColumn('barang', function ($s) {
                    return $s->barang->name;
                })
                ->addColumn('pembeli', function ($s) {
                    return $s->keranjang->pembeli->name;
                })
                ->addColumn('harga', function ($s) {
                    return $s->barang->harga;
                })
                ->rawColumns(['barang', 'pembeli', 'harga'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('.toko.toko.keranjang', $this->sub_menu);
    }
}
