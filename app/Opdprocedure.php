<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opdprocedure extends Model
{
    public function opdpatients()
    {
        return $this->belongsToMany('App\Opdpatient',"opdpatient_opdprocedure");
    }
}
