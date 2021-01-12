<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function comuna()
    {
    	return $this->belongsTo(Comuna::class);
    }
}
