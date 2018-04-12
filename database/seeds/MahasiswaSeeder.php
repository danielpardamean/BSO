<?php

use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Mahasiswa::class, 10)->create()->each(function ($mahasiswa){
            $mahasiswa->bimbingan()->save(factory(App\Bimbingan::class)->make());
        });
    }
}
