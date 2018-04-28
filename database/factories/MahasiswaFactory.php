<?php

use Faker\Generator as Faker;

$factory->define(App\Mahasiswa::class, function (Faker $faker) {
    $randomNIMSuffix = $faker->unique()->numberBetween($min = 100000, $max = 200000);
    $random_number = $faker->numberBetween($min = 1, $max = 32);
    return [
        'nim' => 'F1E' . $randomNIMSuffix,
        'name' => $faker->name,
        'password' => bcrypt('login'),
        'profile_picture' => "public/profile-pictures/$random_number.jpg",
        'program_studi_id' => App\ProgramStudi::inRandomOrder()->first()->id
    ];
});
