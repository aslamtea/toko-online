<?php

namespace App\Toko;

use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    protected $table = 'toko';
    protected $guarded = ['id'];
    public function asaKau()
    {
        if (!$this->gambar) {
            return asset('img/pantai.jpg');
        }
        return asset('img/toko/' . $this->gambar);
    }
}
