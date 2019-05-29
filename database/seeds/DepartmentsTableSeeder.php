<?php

use Illuminate\Database\Seeder;
use App\Department;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $department = new Department();
        $department->dept_name = 'Departemen IT';
        $department->save();
        $department = new Department();
        $department->dept_name = 'Departemen Bisnis';
        $department->save();
        $department = new Department();
        $department->dept_name = 'Departemen Produksi';
        $department->save();
        $department = new Department();
        $department->dept_name = 'Departemen HRD';
        $department->save();
    }
}
