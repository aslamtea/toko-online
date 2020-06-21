<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Admin\Province;

class City extends Model
{
    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id', 'id');
    }
}
