<?php

namespace App\User;

use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    protected $table = 'keranjang';
    protected $fillable = ['pembeli_id', 'jumlah_harga', 'tanggal', 'status'];

    public function pembeli()
    {
        return $this->belongsTo(Pembeli::class, 'pembeli_id', 'id');
    }
}
