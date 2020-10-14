<?php

use Illuminate\Database\Seeder;
use App\Service;
use App\Location;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = Service::where('appointment_id', 1)->get();

        $services->each(function($services){
        	factory(Location::class, 2)->create([
        		'service_id' => $services->id
        	]);
        });
    }
}
