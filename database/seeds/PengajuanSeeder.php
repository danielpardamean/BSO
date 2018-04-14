<?php

use Illuminate\Database\Seeder;

class PengajuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Pengajuan::class, 20)->create()->each(function($pengajuan){
            $pengajuan->koreksi()->saveMany(factory(App\Koreksi::class, 5)->make());
        });
    }
}
