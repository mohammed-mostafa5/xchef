<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MealCreatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // use the factory to create a Faker\Generator instance
        $faker = \Faker\Factory::create();

        for ($i= 1; $i <= 10 ; $i++) {


                DB::table('admins')->insert([
                    'email' => $faker->email,
                    'password' => bcrypt('password'),
                    'adminable_type' => 'meal_creator',
                    'adminable_id' => $i,
                    'created_at' => now(),
                    'updated_at' => now(),
                    'approved_at' => now(),
                ]);
                Admin::find($i + 1)->syncRoles([2]);
                DB::table('meal_creators')->insert([
                    'name' => $faker->name,
                    'bio' => $faker->paragraph(5),
                    'phone' => $faker->e164PhoneNumber,
                    'address' => $faker->address,
                    'latitude' =>$faker->latitude,
                    'longitude' =>$faker->longitude,
                    'photo' => 'image.jpg',
                    'logo' => 'logo.png',
                    'delivery_from' => rand(20,30),
                    'delivery_to' => rand(30,40),
                ]);

        }


    }
}
