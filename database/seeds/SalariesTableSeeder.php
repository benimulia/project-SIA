<?php

use Illuminate\Database\Seeder;
use App\Salary;

class SalariesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $salary = new Salary();
        $salary->s_amount = '1000000';
        $salary->save();
        $salary = new Salary();
        $salary->s_amount = '2000000';
        $salary->save();
        $salary = new Salary();
        $salary->s_amount = '3500000';
        $salary->save();
        $salary = new Salary();
        $salary->s_amount = '4200000';
        $salary->save();
    }
}
