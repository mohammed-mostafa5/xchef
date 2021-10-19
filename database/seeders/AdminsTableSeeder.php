<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Administrator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!DB::table('admins')->first()) {
            DB::table('admins')->insert([
                // 'name' => 'admin',
                'email' => 'admin@email.com',
                'password' => bcrypt('xchefvillage'),
                'adminable_type' => 'administrator',
                'adminable_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'approved_at' => now(),
            ]);
            Admin::find(1)->syncRoles([1]);
            DB::table('administrators')->insert([
                'name' => 'admin',
            ]);
        }
    }
}
