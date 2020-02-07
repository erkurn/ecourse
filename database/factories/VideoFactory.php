<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Video;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Video::class, function (Faker $faker) {
    $title = $faker->sentence(rand(1, 3));
    return [
        'title'         =>  $faker->sentence(rand(1, 3)),
        'slug'          =>  Str::slug($title),
        'embed_id'      =>  'W36YrfSoAvI',
        'content'       =>  $faker->paragraph(rand(3, 10))
    ];
});
