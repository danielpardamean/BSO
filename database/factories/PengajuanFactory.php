<?php

use Faker\Generator as Faker;

$factory->define(App\Pengajuan::class, function (Faker $faker) {
    $bimbingan = App\Bimbingan::inRandomOrder()->first();
    $pembimbing = $bimbingan->mahasiswa->pembimbing->pluck('nip')->random();
    return [
        'bimbingan_id' => $bimbingan->id,
        'title' => $faker->unique()->sentence(),
        'document' => 'public/dokumen-pengajuan/default.pdf',
        'nip' => $pembimbing
    ];
});
