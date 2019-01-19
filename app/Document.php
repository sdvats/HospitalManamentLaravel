<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'opdpatient_id',
        'doc_name',
        'doc_url',
    ];

    public function opdpatient()
    {
        return $this->belongsTo('App\Opdpatient');
    }
}
