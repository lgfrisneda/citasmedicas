<?php

use Illuminate\Database\Seeder;
use App\Service;
use App\Company;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$company = Company::where('entity_id', '!=', 3)->get();

    	$company->each(function($company){
    		factory(Service::class, 2)->create([
    			'entity_id' => $company->entity_id,
    			'company_id' => $company->id
    		]);
    	});

    	$company = Company::where('entity_id', 3)->get();

    	$company->each(function($company){
    		factory(Service::class, 2)->create([
    			'entity_id' => $company->entity_id,
    			'company_id' => $company->id
    		]);
    	});
    }
}
