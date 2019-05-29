<?php

use Illuminate\Database\Seeder;
use App\Country;
class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $country = new Country();
        $country->country_name = 'Indonesia';
        $country->save();
        $country = new Country();
        $country->country_name = 'Amerika';
        $country->save();
    }
}
