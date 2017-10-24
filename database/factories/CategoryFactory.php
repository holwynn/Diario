<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
    // Can be any word really
    return [
        'name' => $faker->word
    ];
});
