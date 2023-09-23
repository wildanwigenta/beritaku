<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            'name' => 'admin',
            'email' => 'adminberita@gmail.com',
            'password' => Hash::make('adminberita'),
            'level' => 'admin',
            'status' => 'active'
        ]);
        DB::table('users')->insert([
            'name' => 'jurnalis',
            'email' => 'jurnalisberita@gmail.com',
            'password' => Hash::make('jurnalisberita'),
            'level' => 'jurnalis',
            'status' => 'nonactive'
        ]);
    }
}

