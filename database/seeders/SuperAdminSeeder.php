<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Jalankan seeder untuk membuat Super Admin dan Admin.
     *
     * @return void
     */
    public function run()
    {
        // 🔹 Cek apakah Super Admin sudah ada
        $superadmin = DB::table('users')->where('username', 'superadmin')->first();
        if (!$superadmin) {
            DB::table('users')->insert([
                'name' => 'Super Admin',
                'username' => 'superadmin',
                'password' => Hash::make('super123'),
                'role' => 'superadmin',
            ]);
        }
        // 🔹 Tambahkan Admin (cek juga agar tidak duplikat)
        $admin = DB::table('users')->where('username', 'admin1')->first();
        if (!$admin) {
            DB::table('users')->insert([
                'name' => 'Admin 1',
                'username' => 'admin1',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
            ]);
        }
        if (!DB::table('users')->where('username', 'admin2')->first()) {
            DB::table('users')->insert([
                'name' => 'Admin 2',
                'username' => 'admin2',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
            ]);
        }
        if (!DB::table('users')->where('username', 'admin3')->first()) {
            DB::table('users')->insert([
                'name' => 'Admin 3',
                'username' => 'admin3',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
            ]);
        }
    }
}
