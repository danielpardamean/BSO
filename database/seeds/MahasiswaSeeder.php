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
        App\Mahasiswa::truncate();
        factory(App\Mahasiswa::class, 20)->create();
    }
}
