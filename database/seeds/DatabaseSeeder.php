<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ProgramStudiSeeder::class);
        $this->call(MahasiswaSeeder::class);
        $this->call(PegawaiSeeder::class);
        $this->call(TypeSeeder::class);
        $this->call(BimbinganSeeder::class);
        $this->call(PengajuanSeeder::class);
    }
}
