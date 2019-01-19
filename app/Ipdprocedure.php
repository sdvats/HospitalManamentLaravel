<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ipdprocedure extends Model
{
  public $timestamps = false;

    protected $fillable = [ 'ipdprocedure_name', ];


  public function ipdpatients()
  {
      return $this->belongsToMany('App\Ipdpatient',"ipdpatient_ipdprocedure");
  }
}
