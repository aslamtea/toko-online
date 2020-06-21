<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Admin\Post;
use Illuminate\Support\Str;
use App\User;
use App\Admin\Categori;


$factory->define(Post::class, function (Faker $faker) {

    $title = $faker->realText(40);
    $slug = Str::slug($title, '-');

    return [
        'judul' => $title,
        'user_id' => function () {
            return factory(User::class)->create()->id;
        },
        'categori_id' => function () {
            return factory(Categori::class)->create()->id;
        },
        'isi' => $faker->realText(1350),
        'gambar' => $faker->randomElement(
            ['thumb-01.jpg', 'thumb-02.jpg', 'thumb-03.jpg', 'thumb-04.jpg', 'thumb-05.jpg', 'thumb-06.jpg', 'thumb-07.jpg', 'thumb-08.jpg', 'thumb-09.jpg', 'thumb-11.jpg', 'thumb-12.jpg', 'thumb-14.jpg',]
        ),
        'slug' => $slug
    ];
});
