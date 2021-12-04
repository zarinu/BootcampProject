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
        $faker=\Faker\Factory::create();
    foreach(range(1,10) as $item){
        Advertisement::create([
            'title'=>$faker->text(20),
            'desc'=>$faker->text(250),
            'price'=>$faker->randomDigitNot(0),
            'mobileNo'=>$faker->phoneNumber(),
            'adress'=>$faker->address()

        ]);
    }
    }
}
