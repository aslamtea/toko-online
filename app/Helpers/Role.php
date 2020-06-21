<?php

use App\Admin\Menu_url;
use App\Admin\Submenu;
use App\Penulis\Penulis;
use Illuminate\Support\Facades\DB;
use App\User\Keranjang;
use App\User\Keranjang_detail;
use App\Toko\Toko;

function Alya()
{
    $kon = auth()->user()->role;
    $ki = DB::table('menu')
        ->select('menu.*')
        ->join('akses', 'menu.id', '=', 'akses.menu_id')
        ->where('akses.role', '=', $kon)
        ->get();

    return $ki;
}

function oke()
{
    $ki = Submenu::orderBy('name', 'ASC')->get();
    return $ki;
}

function oge()
{
    $ki = Menu_url::orderBy('name', 'ASC')->get();
    return $ki;
}
function hehe()
{
    $ki = Menu_url::pluck('name')->get();
    return $ki;
}

function Keranjang()
{
    $pembeli = session('id');
    $keranjang = Keranjang::where('pembeli_id', $pembeli)->where('status', 0)->first();
    $keke = 0;
    if (!$keranjang) {
        return $keke;
    }
    $detail = Keranjang_detail::where('keranjang_id', $keranjang->id)->count();
    return $detail;
}
function toko()
{
    $toko = session('toko_id');
    $toko = Toko::where('id', $toko)->first();
    return $toko;
}

function penulis()
{
    $penulis = session('penulis_id');
    $penulis = Penulis::where('email', $penulis)->first();
    return $penulis;
}
