<?php

use Faker\Generator as Faker;

$factory->define(App\Article::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'slug' => $faker->sentence,
        'tags' => $faker->word,
        'content' => $faker->paragraph(30),
        'status' => 'published',
        'show_image' => true,
        'image' => 'pepe.jpg',
        'category_id' => rand(1, 8)
    ];
});
