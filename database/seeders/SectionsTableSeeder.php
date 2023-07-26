<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SectionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sections')->delete();
        
        \DB::table('sections')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Text',
                'created_at' => '2023-07-15 11:39:17',
                'updated_at' => '2023-07-15 12:29:10',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'FAQ',
                'created_at' => '2023-07-15 12:36:26',
                'updated_at' => '2023-07-16 19:49:28',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Hero',
                'created_at' => '2023-07-15 17:08:43',
                'updated_at' => '2023-07-16 19:47:49',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'about_us',
                'created_at' => '2023-07-16 15:05:20',
                'updated_at' => '2023-07-16 15:06:31',
            ),
        ));
        
        
    }
}