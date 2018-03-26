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
        App\Pengajuan::truncate();
        factory(App\Pengajuan::class, 20)->create();
    }
}
