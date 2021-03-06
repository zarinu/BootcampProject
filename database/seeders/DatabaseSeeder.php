<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

       $this->call([CategorySeeder::class, UserSeeder::class,
            AdvertisementSeeder::class, CommentSeeder::class,
            FavoriteSeeder::class, AdminSeeder::class]);
        // \App\Models\User::factory(10)->create();



    }
}
