<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Itementity;
use App\Models\Storagelocation;
use Faker\Generator as Faker;

$factory->define(Itementity::class, function (Faker $faker) {
    $isConsumable = $faker->boolean;
    $status = $faker->numberBetween(0,4);
    return [
        'identifier' => 'ctfl-' . substr($faker->uuid, 0, 12),
        'status' => $status,
        'borrowed_by' => ($status > 1)?$faker->name():'',
        'consumable' => ($isConsumable)?1:0,
        'amount' => ($isConsumable)?$faker->randomNumber():0,
        'storagelocation_id' => Storagelocation::inRandomOrder()->first()->id,
    ];
});
