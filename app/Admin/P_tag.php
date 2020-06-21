<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class P_tag extends Model
{
    protected $fillable = ['name', 'slug'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
