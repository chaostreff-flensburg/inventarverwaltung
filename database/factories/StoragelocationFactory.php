<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Storagelocation;
use Faker\Generator as Faker;

$factory->define(Storagelocation::class, function (Faker $faker) {
    return [
        'name' => $faker->city,
        'description' => $faker->address,
    ];
});
