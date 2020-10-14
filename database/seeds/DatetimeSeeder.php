<?php

use Illuminate\Database\Seeder;
use App\Professional;
use App\Datetime;

class DatetimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $professional = Professional::all();

        $professional->each(function($professional){
        	factory(Datetime::class, 2)->create([
        		'date' => '2020-10-'.rand(10,31),
        		'professional_id' => $professional->id
        	]);
        });
    }
}
