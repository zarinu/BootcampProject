<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=\Faker\Factory::create();
        foreach(range(1,5) as $item){
            User::create([
                'name'=>$faker->name(50),
                'email'=>$faker->email(100),
                //this is 12345678 in laravel hashing method
                'password'=>'$2y$10$cNMCpQYnd3soKOK/9BT7AuZH14pMQ1MaAdfYvMOVlZI2Pe6PfM8ji'
            ]);
        }
    }
}
