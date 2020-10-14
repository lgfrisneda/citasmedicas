<?php

use Illuminate\Database\Seeder;
use App\Company;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker\Factory::create();

        factory(Company::class, 20)->create();

        //mejorar
        for ($i = 0; $i < 10; $i++) {
			factory(Company::class)->create([
	        	'title' => $faker->name,
	        	'entity_id' => 3
	        ]);
		}
        
    }
}
