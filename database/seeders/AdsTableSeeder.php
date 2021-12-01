<?php

namespace Database\Seeders;

use App\Models\Ads;
use Illuminate\Database\Seeder;

class AdsTableSeeder extends Seeder
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
        Ads::create([
            'title'=>$faker->text(20),
            'desc'=>$faker->text(250),
            'price'=>$faker->randomDigitNot(0),
            'mobileNo'=>$faker->phoneNumber(),
            'adress'=>$faker->address()

        ]);
    }
    }
}
