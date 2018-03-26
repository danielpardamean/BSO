<?php

use Faker\Generator as Faker;

$factory->define(App\Bimbingan::class, function (Faker $faker) {
    $mahasiswa = App\Mahasiswa::all();
    $nim = $mahasiswa[$faker->unique()->numberBetween($min=0, $max=count($mahasiswa)-1)]->nim;
    return [
        'nim' => $nim,
        'title' => $faker->unique()->sentence(),
        'document' => 'default.pdf'
    ];
});
