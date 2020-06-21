<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Merek extends Model
{
    protected $table = 'merek';
    protected $fillable = ['name', 'slug'];
}
