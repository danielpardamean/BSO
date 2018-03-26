<?php

use Faker\Generator as Faker;

$factory->define(App\Pengajuan::class, function (Faker $faker) {
    $bimbingan = App\Bimbingan::all();
    $id = $bimbingan[$faker->numberBetween($min=0, $max=count($bimbingan)-1)]->id;
    return [
        'bimbingan_id' => $id,
        'title' => $faker->unique()->sentence(),
        'document' => 'default.pdf'
    ];
});
