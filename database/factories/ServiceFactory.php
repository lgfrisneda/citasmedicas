<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Service;
use Faker\Generator as Faker;

$factory->define(Service::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(2),
        'image' => $faker->imageUrl($width = 720, $height = 402),
        'description' => $faker->text($maxNbChars = 200),
        'price' => $faker->randomNumber($nbDigits = NULL, $strict = false),
        'entity_id' => rand(1,2),
        'appointment_id' => rand(1,3),
        'company_id' => rand(1,30)
    ];
});
