<?php

namespace Database\Seeders;

use App\Models\Ade;
use App\Models\Ads;
use App\Models\Advertisement;
use Illuminate\Database\Seeder;

class AdvertisementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        foreach (range(1, 20) as $item) {
            Advertisement::create([
                'user_id' => $faker->numberBetween(1, 5),
                'category_id' => $faker->numberBetween(1, 12),
                'title' => $faker->text(27),
                'desc' => $faker->text(303),
                'price' => $faker->randomDigitNot(0),
                'mobileNo' => $faker->phoneNumber(),
                'adress' => $faker->address()
            ]);
        }
    }
}
