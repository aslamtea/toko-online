<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Admin\Merek;
use Illuminate\Support\Str;

$factory->define(Merek::class, function (Faker $faker) {
    $title = $faker->realText(40);
    $slug = Str::slug($title, '-');

    return [
        'name' => $title,
        'slug' => $slug
    ];
});
