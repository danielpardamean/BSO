<?php

use Illuminate\Database\Seeder;

class ProgramStudiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\ProgramStudi::create([
            'name' => 'Sistem Informasi'
        ]);
        App\ProgramStudi::create([
            'name' => 'Kimia'
        ]);
    }
}
