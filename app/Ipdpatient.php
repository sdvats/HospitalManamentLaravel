<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ipdpatient extends Model
{
    public function opdpatient()
    {
      return $this->belongsTo('App\Opdpatient');
    }

    public function ipdprocedures()
    {
        return $this->belongsToMany('App\Ipdprocedure');
    }
    /**
     * Get a list of associated procedures with Current Ipdatient
     * @return mixed
     */

    public function getIpdprocedureListAttribute()
    {
        return $this->ipdprocedures->pluck('id')->all();
    }

    public function scopeSearchByKeyword($query, $keyword)
    {
        if ($keyword!='')
        {
            $query->where(function ($query) use ($keyword)
            {
                $query->where("ipd_no", "LIKE","%$keyword%");
            });
        }
        return $query;
    }
}
