<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder; // <- wajib
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // login untuk semua bisa di rubah di sini
        DB::table('users')->insert([
            'username' => 'siswa',
            'password' => Hash::make('siswapkl'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'username' => 'admin',
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}



