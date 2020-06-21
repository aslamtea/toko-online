<?php

namespace App\Toko;

use App\Admin\Barang;
use Illuminate\Database\Eloquent\Model;

class Gambar extends Model
{
    protected $table = 'gambar';
    protected $fillable = ['name', 'barang_id'];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id', 'id');
    }
}
