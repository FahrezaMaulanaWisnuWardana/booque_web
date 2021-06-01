<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'api',
            'email' => 'reza11.6a@gmail.com',
            'password' => Hash::make('booque123'),
            'level' => 'admin'
        ]);
        DB::table('users')->insert([
            'name' => 'reza',
            'email' => 'reza12.xi@gmail.com',
            'password' => Hash::make('booque123'),
            'level' => 'user'
        ]);
    }
}
