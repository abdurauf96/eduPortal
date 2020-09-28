<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function courses()
    {
    	return $this->belongsToMany('App\Course', 'course_student');
    }
}
