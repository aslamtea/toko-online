<?php

namespace App\Admin;

use App\Toko\Toko;
use Illuminate\Database\Eloquent\Model;
use App\Admin\Merek;
use App\Admin\Kategori;
use App\Admin\City;
use App\Toko\Gambar;
use App\User\Keranjang_detail;

class Barang extends Model
{
    protected $table = 'barang';
    protected $guarded = ['id'];
    public function user()
    {
        return $this->belongsTo(Toko::class, 'toko_id', 'id');
    }
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
    }
    public function merek()
    {
        return $this->belongsTo(Merek::class, 'merek_id', 'id');
    }
    public function city()
    {
        return $this->belongsTo(City::class, 'kota', 'id');
    }
    public function gambar()
    {
        return $this->hasMany(Gambar::class, 'barang_id', 'id')->orderBy('id', 'DESC')->take(1);
    }
    public function keranjangn_detail()
    {
        return $this->hasMany(Keranjang_detail::class, 'barang_id', 'id')->orderBy('id', 'DESC');
    }
    public function toko()
    {
        return $this->belongsTo(Toko::class, 'toko_id', 'id');
    }
}
