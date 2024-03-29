<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\posts;
use Faker\Generator as Faker;

$factory->define(posts::class, function (Faker $faker) {
    return [
        'user_id' => factory(\App\User::class),
        'body' => $faker->paragraph
    ];
});
