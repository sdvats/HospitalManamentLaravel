<?php

namespace App;

use DateTime;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [

        'appt_datetime',
        'appt_note',
    ];

    public function opdpatient()
    {
        return $this->belongsTo('App\Opdpatient');
    }



}