<?php

use Illuminate\Database\Seeder;
use App\Division;

class DivisionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $divisi = new Division();
        $divisi->division_name = 'Divisi IT Support';
        $divisi->save();
        $divisi = new Division();
        $divisi->division_name = 'Divisi Marketing And Sales';
        $divisi->save();
        $divisi = new Division();
        $divisi->division_name = 'Divisi Personalia';
        $divisi->save();
        $divisi = new Division();
        $divisi->division_name = 'Divisi Research and Testing';
        $divisi->save();
    }
}
