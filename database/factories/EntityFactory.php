<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Entity;
use Faker\Generator as Faker;

$factory->define(Entity::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'image' => $faker->imageUrl($width = 720, $height = 402, 'technics')
    ];
});
