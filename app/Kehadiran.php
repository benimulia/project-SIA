<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kehadiran extends Model
{
    /**
     * @return object
     */
    public function empKehadiran(){
        return $this->belongsTo('App\Employee','employee_id');
    }
}
