<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Admin\Barang;
use Faker\Generator as Faker;
use App\Admin\Kategori;
use Illuminate\Support\Str;
use App\User;
use App\Admin\Merek;

$factory->define(Barang::class, function (Faker $faker) {
    $title = $faker->realText(30);
    $slug = Str::slug($title, '-');

    return [
        'name' => $title,
        'user_id' => function () {
            return factory(User::class)->create()->id;
        },
        'Kategori_id' => function () {
            return factory(Kategori::class)->create()->id;
        },
        'merek_id' => function () {
            return factory(Merek::class)->create()->id;
        },
        'isi' => $faker->realText(850),
        'gambar' => $faker->randomElement(
            ['r1.jpg', 'r2.jpg', 'r3.jpg', 'r4.jpg', 'r5.jpg', 'r6.jpg', 'r7.jpg', 'r8.jpg', 'r9.jpg', 'r10.jpg', 'r11.jpg', 'r12.jpg', 'l1.jpg', 'l2.jpg', 'l3.jpg']
        ),
        'slug' => $slug,
        'berat' => 1000,
        'stok' => 10,
        'harga' => 30000
    ];
});
