<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Patient;
use Faker\Generator as Faker;

$factory->define(Patient::class, function (Faker $faker) {
    return [
        'dni' => $faker->randomNumber($nbDigits = NULL, $strict = false),
        'fullname' => $faker->name,
        'birthdate' => $faker->date($format = 'Y-m-d', $max = '2001-12-31'),
        'gender' => $faker->randomElement(['F', 'M']),
        'phone' => $faker->phoneNumber,
        'email' => $faker->email,
        'address' => $faker->address,
        'city' => $faker->city
    ];
});
