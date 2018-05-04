<?php

use Faker\Generator as Faker;

$factory->define(App\Pegawai::class, function (Faker $faker) {
    $random_number = $faker->numberBetween($min = 1, $max = 32);
    return [
        'nip' => '123456789098765' . $faker->unique()->numberBetween($min = 10000, $max = 19999),
        'name' => $faker->name,
        'password' => bcrypt('login'),
        'profile_picture' => "public/profile-pictures/$random_number.jpg",
        'id_type' => $faker->numberBetween($min = 1, $max = 2)
    ];
});
