<?php

use Faker\Generator as Faker;

$factory->define(App\Pegawai::class, function (Faker $faker) {
    return [
        'nip' => $faker->unique()->numberBetween($min = 100000, $max = 200000),
        'name' => $faker->name,
        'password' => bcrypt('login'),
        'profile_picture' => 'default.png',
        'id_type' => $faker->numberBetween($min = 1, $max = 2)
    ];
});
