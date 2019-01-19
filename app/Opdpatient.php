<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opdpatient extends Model
{
    protected $fillable = [

            'patient_id',
            'first_name',
            'last_name',
            'gender',
            'birth_date',
            'address',
            'country',
            'email',
            'contact',
            'mode',
            'remarks',
    ];


    public function country()
    {
      return $this->belongsTo('App\Country');
    }

    public function appointments()
    {
        return $this->hasMany('App\Appointment');

    }

    public function estimates()
    {
        return $this->hasMany('App\Estimate');

    }
    public function payments()
    {
        return $this->hasMany('App\Payment');
    }
    public function documents()
    {
        return $this->hasMany('App\Document');
    }

    public function itineraries()
    {
        return $this->hasMany('App\Itinerary');
    }

    public function ipdpatients()
    {
      return $this->hasMany('App\Ipdpatient');
    }

    public function scopeSearchByKeyword($query, $keyword)
    {
        if ($keyword!='') {
            $query->where(function ($query) use ($keyword) {
                $query->where("patient_id", "LIKE","%$keyword%")
                    ->orWhere("first_name", "LIKE", "%$keyword%")
                    ->orWhere("last_name", "LIKE", "%$keyword%")
                    ->orWhere("address", "LIKE", "%$keyword%")
                    ->orWhere("country", "LIKE", "%$keyword%")
                    ->orWhere("email", "LIKE", "%$keyword%")
                    ->orWhere("contact", "LIKE", "%$keyword%");
            });
        }
        return $query;
    }
}
