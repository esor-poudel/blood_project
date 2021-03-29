<?php

use Illuminate\Database\Seeder;
use App\District;

class DistrictTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        District::create([
            'name'=>'kathmandu',

        ]);
        
        District::create([
            'name'=>'bhaktapur',
                            
        ]);
        
        District::create([
            'name'=>'lalitpur',
                            
        ]);
    }
}
