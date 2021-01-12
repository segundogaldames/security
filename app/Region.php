<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $fillable = ['nombre'];

    public function comunas()
    {
    	return $this->hasMany(Comuna::class);
    }
}
