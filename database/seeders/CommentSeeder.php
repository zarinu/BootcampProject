<?php

namespace Database\Seeders;

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
        $thisTime = Carbon::now()->format('Y-m-d H:i:s');
        DB::table('comments')->insertOrIgnore([
            [
                'user_id' => '1',
                'ads_id' => '2',
                'body' => 'nice ade!',
                'is_status' => $thisTime,
                'updated_at' => $thisTime
            ],

            [
                'user_id' => '2',
                'ads_id' => '4',
                'body' => 'i never seen better than this advertisement',
                'is_status' => $thisTime,
                'updated_at' => $thisTime
            ],
        ]);
    }
}
