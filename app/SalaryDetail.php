<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SalaryDetail extends Model
{
    use SoftDeletes;
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    
    /**
     *  Below all methods are creating Eloquent's One to Many (inverse) Relationships.
     *  for example, many employees can have a same department.
     *
     */

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
