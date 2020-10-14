<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
    	'dni', 'fullname', 'birthdate', 'sex', 'phone', 'email', 'address', 'city'
    ];
}
