<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RolesPermissionsTableSeeder::class,
            AdminsTableSeeder::class,
            OptionTableSeeder::class,
            SliderTableSeeder::class,
            PageTableSeeder::class,
            InformationTableSeeder::class,
            SocialLinkTableSeeder::class,
            MealCreatorSeeder::class,
        ]);
    }
}
