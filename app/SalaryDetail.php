<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalaryDetail extends Model
{
    /**
     * @return object
     */
    public function salEmployee(){
        return $this->belongsTo('App\Employee','employee_id');
    }

    /**
     * @return object
     */
    public function salDepartment(){
        /**
         *  return department which belongs to an employee.
         *  first parameter is the model and second is a
         *  foreign key.
         */
        return $this->belongsTo('App\Department','dept_id');
    }

    /**
     * @return object
     */
    public function salDivision(){
        return $this->belongsTo('App\Division','division_id');
    }

    /**
     * @return object
     */
    public function salSalary(){
        return $this->belongsTo('App\Salary','salary_id');
    }

    /**
     * @return object
     */
    public function salPotongan(){
        return $this->belongsTo('App\Potongan','potongan_id');
    }

    /**
     * @return object
     */
    public function salTunjangan(){
        return $this->belongsTo('App\Tunjangan','tunjangan_id');
    }
    
}
