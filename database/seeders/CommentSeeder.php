<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = \Faker\Factory::create();
        foreach (range(1, 40) as $item) {
            Comment::create([
                'user_id' => $faker->numberBetween(1, 5),
                'ads_id' => $faker->numberBetween(1, 20),
                'body' => $faker->text(100),
                'is_status' => 0,
            ]);
        }
    }
}
