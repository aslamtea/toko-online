<?php

namespace App\User;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table = 'pesanan';
    protected $guarded = ['id'];
}
