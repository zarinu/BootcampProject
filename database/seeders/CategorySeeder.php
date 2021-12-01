<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategorySeeder extends Seeder
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
        DB::table('categories')->insertOrIgnore([
            ['name' => 'مربوط به خانه',
            'name_en' => 'Related to the House',
            'parent_id' => 0,
            'created_at' => $thisTime,
            'updated_at' => $thisTime],

            ['name' => 'وسایل شخصی',
            'name_en' => 'Personal Items',
            'parent_id' => 0,
            'created_at' => $thisTime,
            'updated_at' => $thisTime],

            ['name' => 'وسایل نقلیه',
            'name_en' => 'Vehicks',
            'parent_id' => 0,
            'created_at' => $thisTime,
            'updated_at' => $thisTime],

            ['name' => 'املاک',
            'name_en' => 'Home',
            'parent_id' => 0,
            'created_at' => $thisTime,
            'updated_at' => $thisTime],

            ['name' => 'وسایل برقی',
            'name_en' => 'Electronic Items',
            'parent_id' => 1,
            'created_at' => $thisTime,
            'updated_at' => $thisTime],

            ['name' => 'اتاق خواب',
            'name_en' => 'Bed Room',
            'parent_id' => 1,
            'created_at' => $thisTime,
            'updated_at' => $thisTime],

            ['name' => 'لباس',
            'name_en' => 'Clothing',
            'parent_id' => 2,
            'created_at' => $thisTime,
            'updated_at' => $thisTime],

            ['name' => 'جواهرات',
            'name_en' => 'Jewellery',
            'parent_id' => 2,
            'created_at' => $thisTime,
            'updated_at' => $thisTime],

            ['name' => 'موتور',
            'name_en' => 'Motorcycle',
            'parent_id' => 3,
            'created_at' => $thisTime,
            'updated_at' => $thisTime],

            ['name' => 'سواری',
            'name_en' => 'Car',
            'parent_id' => 3,
            'created_at' => $thisTime,
            'updated_at' => $thisTime],

            ['name' => 'آپارتمان',
            'name_en' => 'Apartment',
            'parent_id' => 4,
            'created_at' => $thisTime,
            'updated_at' => $thisTime],

            ['name' => 'ویلایی',
            'name_en' => 'Villa',
            'parent_id' => 4,
            'created_at' => $thisTime,
            'updated_at' => $thisTime],
        ]);
    }
}
