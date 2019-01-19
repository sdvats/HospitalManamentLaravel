<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Callernote extends Model
{

    public function caller()
    {
        return $this->belongsTo('App\Caller');
    }
}
