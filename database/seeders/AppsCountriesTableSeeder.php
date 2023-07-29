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
                'country_code' => 'EG',
                'country_name' => 'Egypt',
            ),
            1 => 
            array (
                'id' => 2,
                'country_code' => 'US',
                'country_name' => 'United States of America',
            ),
        ));
        
        
    }
}