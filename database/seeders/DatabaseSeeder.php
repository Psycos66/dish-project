<?php

namespace Database\Seeders;

use App\Models\Dish;
use App\Models\DishPicture;
use App\Models\User;
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
        User::factory(10)->create();
        Dish::factory(10)->afterCreating(function (Dish $dish) {
            $dish->users()->attach(User::inRandomOrder()->first());
        })->create();
        DishPicture::factory(10)->create();
    }
}
