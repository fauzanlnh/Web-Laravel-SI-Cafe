<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 20; $i++) {
            \DB::table('tables')->insert([
                'name' => 'Meja No ' . $i,
                'status' => "Kosong",
            ]);
        }
    }
}
