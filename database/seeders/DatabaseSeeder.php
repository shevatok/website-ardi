<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void {

        
        DB::table('users')-> insert([
            'name' => 'petai',
            'email' => 'petai@gmail.com',
            'password' => bcrypt('petai123'),
        ]);
        DB::table('admins')-> insert([
            'name' => 'sepa',
            'email' => 'sepa@gmail.com',
            'password' => bcrypt('sepa123'),
        ]);
    }
}
