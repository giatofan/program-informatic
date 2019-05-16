<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Models\Offer::class, function (Faker $faker) {
    return [
        'service_id' => getInstanceOf(App\Models\Service::class),
        'customer_id' => getInstanceOf(App\Models\Customer::class),
        'discount' => $faker->numberBetween(0, 20),
        'accepted' => $faker->numberBetween(0, 1),
    ];
});
