<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    public function region()
    {
        return $this->belongsTo('App\Region');
    }
}
