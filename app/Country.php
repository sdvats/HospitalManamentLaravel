<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{

    public function oldpatient()
    {
        return $this->belongsTo('App\Oldpatient');
    }

    public function opdpatient()
    {
        return $this->hasMany('App\Opdpatient');
    }
}
