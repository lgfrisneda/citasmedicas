<?php

use Illuminate\Database\Seeder;
use App\Service;
use App\Professional;

class ProfessionalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $service = Service::all();

        $service->each(function($service){
        	factory(Professional::class, 3)->create([
        		'service_id' => $service->id
        	]);
        });
    }
}
