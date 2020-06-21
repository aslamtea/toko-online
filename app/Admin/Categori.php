<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Categori extends Model
{
    protected $table = 'categoris';
    protected $fillable = ['name', 'slug'];
}
