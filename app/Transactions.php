<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    /**
     * @return object
     */
    public function transGaji(){
        return $this->belongsTo('App\SalaryDetail','penggajian_id');
    }

}
