<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        for ($i = 1; $i <= 10; $i++) {
            $randomRole = $faker->randomElement(['admin', 'koki', 'petugas']);
            // insert data dummy menu dengan faker
            $user_id = \DB::table('users')->insertGetId([
                'username' => $faker->userName,
                'password' => bcrypt('password'),
                'role' => $randomRole,
            ]);

            \DB::table('staff')->insert([
                'name' => $faker->name,
                'phone_number' => $faker->phoneNumber,
                'address' => $faker->address,
                'user_id' => $user_id
            ]);
        }

    }
}
