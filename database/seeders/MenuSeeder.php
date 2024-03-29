<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $faker->addProvider(new \FakerRestaurant\Provider\id_ID\Restaurant($faker));
        for ($x = 1; $x <= 10; $x++) {
            \DB::table('menus')->insert([
                'name' => $faker->foodName(),
                'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Veniam neque illo iste quod commodi consequuntur quaerat id, fugiat odit sequi.',
                'serving_time' => rand(10, 30),
                'price' => $faker->numberBetween(10000, 300000),
                'category' => "Food",
                'status' => "available",
            ]);
        }
        for ($x = 1; $x <= 10; $x++) {
            \DB::table('menus')->insert([
                'name' => $faker->beverageName(),
                'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Veniam neque illo iste quod commodi consequuntur quaerat id, fugiat odit sequi.',
                'serving_time' => rand(10, 20),
                'price' => $faker->numberBetween(5000, 50000),
                'category' => "Drink",
                'status' => "available",
            ]);
        }
    }
}
