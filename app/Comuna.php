<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comuna extends Model
{
	protected $fillable = ['nombre','region_id'];

    public function region()
    {
    	return $this->belongsTo(Region::class);
    }

    public function people()
    {
    	return $this->hasMany(Person::class);
    }
}
