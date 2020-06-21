<?php

namespace App\Admin;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['judul', 'user_id', 'categori_id', 'isi', 'slug'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function categori()
    {
        return $this->belongsTo(Categori::class, 'categori_id', 'id');
    }
    public function p_tag()
    {
        return $this->belongsToMany(P_tag::class);
    }
}
