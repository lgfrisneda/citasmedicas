<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientRep extends Model
{
    protected $fillable = [
    	'dni', 'fullname', 'birthdate', 'relationship', 'phone', 'email', 'address', 'city','patient_id'
    ];
}
