<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Models\Service::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->domainWord,
        'description' => $faker->text,
        'price' => $faker->randomNumber(2),
    ];
});
