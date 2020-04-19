<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\News;
use Faker\Generator as Faker;

$factory->define(News::class, function (Faker $faker) {
    return [
        'user_id' => factory(App\User::class),
        'title' =>$faker->sentence,
        'body' => $faker->paragraph
    ];
});
