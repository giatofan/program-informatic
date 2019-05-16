<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Models\Contract::class, function (Faker $faker) {
    return [
        'offer_id' => getInstanceOf(App\Models\Offer::class),
        'start_date' => $faker->date(),
        'end_date' => $faker->date(),
        'penalty' => 0,
    ];
});
