<?php

use Illuminate\Database\Seeder;
use App\City;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $city = new City();
        $city->city_name = 'Yogyakarta';
        $city->zip_code = '22555';
        $city->save();
        $city = new City();
        $city->city_name = 'Jakarta Barat';
        $city->zip_code = '333243';
        $city->save();
    }
}
