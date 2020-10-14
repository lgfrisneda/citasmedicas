<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Professional;
use Faker\Generator as Faker;

$factory->define(Professional::class, function (Faker $faker) {
    return [
        'photo' => $faker->imageUrl($width = 720, $height = 402, 'people'),
        'name' => $faker->name,
        'speciality' => $faker->title,
        'description' => $faker->sentence(10),
        'service_id' => rand(1, 60)
    ];
});
