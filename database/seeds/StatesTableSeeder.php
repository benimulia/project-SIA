<?php

use Illuminate\Database\Seeder;
use App\State;
class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $state = new State();
        $state->state_name = 'DI Yogyakarta';
        $state->save();
        $state = new State();
        $state->state_name = 'DKI Jakrta';
        $state->save();
    }
}
