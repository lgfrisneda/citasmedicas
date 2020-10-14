<?php

use Illuminate\Database\Seeder;
use App\Appointment;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Appointment::create([
        	'title' => 'Consultorio',
        	'image' => 'https://cdn.pixabay.com/photo/2016/02/29/15/01/doctor-1228627_960_720.jpg',
        	'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum sodales a tellus id placerat.'
        ]);
        Appointment::create([
        	'title' => 'Domicilio',
        	'image' => 'https://cdn.pixabay.com/photo/2016/04/25/23/30/home-1353389__340.jpg',
        	'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum sodales a tellus id placerat.'
        ]);
        Appointment::create([
        	'title' => 'Telemática',
        	'image' => 'https://cdn.pixabay.com/photo/2020/06/26/14/38/doctor-5342890_960_720.jpg',
        	'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum sodales a tellus id placerat.'
        ]);
    }
}
