<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Admin\Kategori;
use Illuminate\Support\Str;

$factory->define(Kategori::class, function (Faker $faker) {

    $title = $faker->realText(40);
    $slug = Str::slug($title, '-');

    return [
        'name' => $title,
        'slug' => $slug
    ];
});
