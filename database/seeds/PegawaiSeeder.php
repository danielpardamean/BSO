<?php

use Illuminate\Database\Seeder;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Pegawai::truncate();
        factory(App\Pegawai::class, 20)->create();
    }
}
