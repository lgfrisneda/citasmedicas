<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Location extends Model
{
    public function setNameAttribute($value)
    {
    	$this->attributes['name'] = $value;
    	$this->attributes['slug'] = Str::slug($value);
    }
}
