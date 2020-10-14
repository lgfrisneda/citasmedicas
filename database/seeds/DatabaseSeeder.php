<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(EntitySeeder::class);
        $this->call(AppointmentSeeder::class);
        $this->call(CompanySeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(LocationSeeder::class);
        $this->call(ProfessionalSeeder::class);
        $this->call(DatetimeSeeder::class);
        $this->call(PatientSeeder::class);
    }
}
