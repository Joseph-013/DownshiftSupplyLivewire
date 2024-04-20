<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            // Admin
            [
                'username' => 'admin',
                'fullname' => 'adminfullname',
                'email' => 'admin@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('11111111'),
                'usertype' => 'admin',
            ],
            // User
            [
                'username' => 'test',
                'fullname' => 'testfullname',
                'email' => 'test@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('11111111'),
                'usertype' => 'user',
            ],
            // [
            //     'username' => 'test2',
            //     'fullname' => 'testfullname2',
            //     'email' => 'test2@gmail.com',
            //     'email_verified_at' => now(),
            //     'password' => Hash::make('11111111'),
            //     'usertype' => 'user',
            // ],
        ]);
    }
}
