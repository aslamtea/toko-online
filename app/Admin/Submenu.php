<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Submenu extends Model
{
    protected $table = 'submenu';

    protected $fillable = ['name', 'icon', 'menu_id'];

    public function menu_url()
    {
        return $this->hasMany(Menu_url::class);
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
