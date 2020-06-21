<?php

namespace App\Penulis;

use Illuminate\Database\Eloquent\Model;

class Penulis extends Model
{
    protected $table = 'penulis';
    protected $guarded = ['id'];

    public function asaKau()
    {
        if (!$this->gambar) {
            return asset('img/pantai.jpg');
        }
        return asset('img/penulis/' . $this->gambar);
    }
}
