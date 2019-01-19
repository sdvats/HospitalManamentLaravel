<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Procedure extends Model
{
    /**
     * Get the Oldpatient with the associated procedure
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function oldpatients()
    {
        return $this->belongsToMany('App\Oldpatient',"oldpatient_procedure");
    }
}
