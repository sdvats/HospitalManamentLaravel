<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Caller extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'gender','city','country','email','mobile','mode','procedure','detail','phase','remarks','reminder',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token'
    ];

    protected $primaryKey = 'id';


    public function callernote()
    {
        return $this->hasMany('App\Callernote');
    }

    public function scopeSearchByKeyword($query, $keyword)
    {
        if ($keyword!='') {
            $query->where(function ($query) use ($keyword) {
                $query->where("first_name", "LIKE","%$keyword%")
                    ->orWhere("last_name", "LIKE", "%$keyword%")
                    ->orWhere("city", "LIKE", "%$keyword%")
                    ->orWhere("country", "LIKE", "%$keyword%")
                    ->orWhere("email", "LIKE", "%$keyword%")
                    ->orWhere("mobile", "LIKE", "%$keyword%");
            });
        }
        return $query;
    }

}
