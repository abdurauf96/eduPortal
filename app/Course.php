<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function schools()
    {
    	return $this->belongsToMany('App\School');
    }

    public function category()
    {
    	return $this->belongsTo('App\CategoryCourse', 'category_id', 'id');
    }
}
