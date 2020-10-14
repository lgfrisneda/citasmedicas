<?php

use Illuminate\Database\Seeder;
use App\Patient;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Patient::class, 5)->create();

        Patient::create([
        	'dni' => '1234567',
        	'fullname' => 'Usuario menor',
        	'birthdate' => '2010-10-19',
        	'gender' => 'M',
        	'phone' => '0192827746',
        	'email' => 'correo@email.com',
        	'address' => 'Capitolio',
        	'city' => 'Caracas'
        ]);
    }
}
