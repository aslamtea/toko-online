<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Akses extends Model
{
    protected $table = 'akses';
    protected $fillable = ['role', 'menu_id'];

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id', 'id');
    }
}
