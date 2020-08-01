<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Image;
use Faker\Generator as Faker;

$factory->define(Image::class, function (Faker $faker) {
    $filePath = public_path('storage/images');

    return [
        'filename' => $faker->image($dir = $filePath, $width = 640, $height = 480, 'technics', false),
    ];
});
