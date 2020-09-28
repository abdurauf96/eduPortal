<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    public function region()
    {
    	return $this->belongsTo('App\Region');
    }

    public function district()
    {
    	return $this->belongsTo('App\District');
    }

    public function courses()
    {
    	return $this->belongsToMany('App\Course');
    }

    public function categories()
    {
        return $this->belongsToMany('App\CategoryCourse');
    }

    public function students()
    {
        return $this->hasMany('App\Student');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
