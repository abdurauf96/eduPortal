<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Audio extends Model
{
    protected $table='audios';

    public function category()
    {
    	return $this->belongsTo('App\CategoryAudio');
    }
}
