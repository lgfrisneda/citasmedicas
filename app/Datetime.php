<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Professional;

class Datetime extends Model
{
    public function professional()
    {
    	return $this->belongsTo(Professional::class);
    }
}
