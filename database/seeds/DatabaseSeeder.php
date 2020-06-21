<?php

use App\Admin\City;
use App\Admin\Province;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call(ProvinceSeeder::class);
        $this->call(CitySeeder::class);
    }
}
