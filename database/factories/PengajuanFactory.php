<?php

use Faker\Generator as Faker;

$factory->define(App\Pengajuan::class, function (Faker $faker) {
    return [
        'bimbingan_id' => App\Bimbingan::inRandomOrder()->first()->id,
        'title' => $faker->unique()->sentence(),
        'document' => 'default.pdf'
    ];
});
