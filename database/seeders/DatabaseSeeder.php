<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => '1',
            'nama' => 'admin',
            'noTelepon' => '081234567890',
            'alamat' => 'Universitas Brawijaya',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'), // password
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
