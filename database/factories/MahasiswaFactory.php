<?php

use Faker\Generator as Faker;

$factory->define(App\Mahasiswa::class, function (Faker $faker) {
    return [
        'nim' => 'F1E' . $faker->unique()->numberBetween($min = 100000, $max = 200000),
        'name' => $faker->name,
        'password' => bcrypt('login'),
        'profile_picture' => 'default.png',
        'program_studi_id' => 1
    ];
});
