<?php

use Illuminate\Database\Seeder;

class BimbinganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Bimbingan::truncate();
        factory(App\Bimbingan::class, 20)->create();
    }
}
