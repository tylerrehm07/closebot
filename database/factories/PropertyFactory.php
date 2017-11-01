<?php

use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\Property::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'address1' => $faker->streetAddress,
        'city'  => $faker->city,
        'state' =>$faker->stateAbbr,
        'zip' => $faker->postcode,
        'latitude' => $faker->latitude,
        'longitude' => $faker->longitude
    ];
});
