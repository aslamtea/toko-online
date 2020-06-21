<?php

namespace App\User;

use App\Admin\Barang;
use Illuminate\Database\Eloquent\Model;
use App\User\Keranjang;

class Keranjang_detail extends Model
{
    protected $table = 'keranjang_detail';
    protected $fillable = ['barang_id', 'keranjang_id', 'jumlah', 'jumlah_harga', 'toko_id', 'berat_total'];
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id', 'id');
    }
    public function keranjang()
    {
        return $this->belongsTo(Keranjang::class, 'keranjang_id', 'id');
    }
}
