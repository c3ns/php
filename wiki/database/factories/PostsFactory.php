<?php

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'content' => $faker->text(),
        'title' => $faker->text(50),
        'category' => rand(1,10),
        'user' => 1,
    ];
});
