<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Oldpatient extends Model
{
    protected $fillable = [
                'ipd_no','date','first_name','last_name','age','gender','contact_1','contact_2','country','state','remarks'
];

    public function procedures()
    {
        return $this->belongsToMany('App\Procedure');
    }

    public function countries()
    {
        return $this->hasOne('App\Country');
    }

    /**
     * Get a list of associated procedures with Current OldPatient
     * @return mixed
     */

    public function getProcedureListAttribute()
    {
        return $this->procedures->pluck('id')->all();
    }

    public function scopeSearchByKeyword($query, $keyword)
    {
        if ($keyword!='') {
            $query->where(function ($query) use ($keyword) {
                $query->where("ipd_no", "LIKE","%$keyword%")
                    ->orWhere("first_name", "LIKE", "%$keyword%")
                    ->orWhere("last_name", "LIKE", "%$keyword%")
                    ->orWhere("contact_1", "LIKE", "%$keyword%")
                    ->orWhere("contact_2", "LIKE", "%$keyword%")
                    ->orWhere("state", "LIKE", "%$keyword%")
                    ->orWhere("country", "LIKE", "%$keyword%");
            });
        }
        return $query;
    }
}
