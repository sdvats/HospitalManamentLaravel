<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Itinerary extends Model
{
    protected $fillable = [
        'opdpatient_id',
        'arrival_date',
        'currency',
        'payment_note',
    ];

    public function opdpatient()
    {
        return $this->belongsTo('App\Opdpatient');
    }
}
