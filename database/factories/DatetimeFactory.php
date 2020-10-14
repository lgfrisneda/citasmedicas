<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Datetime;
use Faker\Generator as Faker;

$factory->define(Datetime::class, function (Faker $faker) {
    return [
        'date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'time' => $faker->time($format = 'H:i:s', $max = 'now'),
        'professional_id' => rand(1, 180)
    ];
});
