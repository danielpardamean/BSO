<?php

use Faker\Generator as Faker;

$factory->define(App\Koreksi::class, function (Faker $faker) {
    return [
        'nip' => App\Pegawai::where('id_type', 1)->inRandomOrder()->first()->nip,
        'information' => $faker->text,
        'document' => 'default.pdf',
    ];
});
