<?php

use Faker\Generator as Faker;

$factory->define(App\Bimbingan::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->sentence(),
        'document' => 'default.pdf'
    ];
});
