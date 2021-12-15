<?php

namespace Database\Seeders;

use App\Models\Favorite;
use Illuminate\Database\Seeder;

class FavoriteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ////
        $faker = \Faker\Factory::create();
        foreach (range(1, 40) as $item) {
            Favorite::create([
                'user_id' => $faker->numberBetween(1, 5),
                'ads_id' => $faker->numberBetween(1, 20),
            ]);
        }
    }
}
