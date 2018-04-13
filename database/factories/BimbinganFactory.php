<?php

use Faker\Generator as Faker;

$factory->define(App\Bimbingan::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->sentence(),
        'document' => 'default.pdf',
        'tanggal_mulai_bimbingan' => $faker->date($format = 'Y-m-d', $max = 'now')
    ];
});
