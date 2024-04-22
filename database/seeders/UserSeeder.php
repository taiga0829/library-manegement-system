<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        // Create a reader
        DB::table('users')->insert([
            'name' => 'Reader',
            'email' => 'reader@brs.com',
            'password' => Hash::make('password!'),
            'role' => 'reader',
        ]);

        // Create a librarian
        DB::table('users')->insert([
            'name' => 'Librarian',
            'email' => 'librarian@brs.com',
            'password' => Hash::make('password!'),
            'role' => 'librarian',
        ]);
    }
}