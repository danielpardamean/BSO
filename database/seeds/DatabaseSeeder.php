<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        
        $this->call(ProgramStudiSeeder::class);
        $this->call(MahasiswaSeeder::class);
        $this->call(PegawaiSeeder::class);
        $this->call(TypeSeeder::class);
        $this->call(PengajuanSeeder::class);
        
        Model::reguard();
    }
}
