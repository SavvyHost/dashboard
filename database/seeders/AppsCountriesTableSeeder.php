<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AppsCountriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('apps_countries')->delete();
        
        \DB::table('apps_countries')->insert(array (
            0 => 
            array (
                'id' => 1,
                'code' => 'EG',
                'name' => 'Egypt',
            ),
            1 => 
            array (
                'id' => 2,
                'code' => 'US',
                'name' => 'United States of America',
            ),
        ));
        
        
    }
}