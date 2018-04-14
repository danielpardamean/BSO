<?php

use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Type::create([
            'name' => 'admin'
        ]);

        App\Type::create([
            'name' => 'dosen'
        ]);
    }
}
