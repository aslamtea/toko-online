<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Menu_url extends Model
{
    protected $table = 'menu_url';

    protected $fillable = ['submenu_id', 'name', 'url'];

    public function submenu()
    {
        return $this->belongsTo(Submenu::class, 'submenu_id', 'id');
    }
}
