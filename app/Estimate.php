<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estimate extends Model
{
    protected $fillable = [
        'opdpatient_id',
        'amount',
        'currency',
        'payment_note',
    ];

    public function opdpatient()
    {
        return $this->belongsTo('App\Opdpatient');
    }
}
