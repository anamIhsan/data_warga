<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('12345'),
            'roles' => 'SUPER ADMIN',
        ]);

        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345'),
            'roles' => 'ADMIN',
        ]);

        DB::table('users')->insert([
            'name' => 'Watcher',
            'email' => 'watcher@gmail.com',
            'password' => Hash::make('12345'),
            'roles' => 'WATCHER',
        ]);
    }
}
