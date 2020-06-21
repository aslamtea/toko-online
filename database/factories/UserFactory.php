<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'role' => 'user',
        'email_verified_at' => now(),
        'gambar' => $faker->randomElement(
            ['thumb-01.jpg', 'thumb-02.jpg', 'thumb-03.jpg', 'thumb-04.jpg', 'thumb-05.jpg', 'thumb-06.jpg', 'thumb-07.jpg', 'thumb-08.jpg', 'thumb-09.jpg', 'thumb-11.jpg', 'thumb-12.jpg', 'thumb-14.jpg',]
        ),
        'password' => bcrypt('aslam'), // password
        'remember_token' => Str::random(10),
    ];
});
