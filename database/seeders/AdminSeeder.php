<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'super_admin',
            'email' => 'su@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password') // password
        ])->assignRole('super-admin');

        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password') // password
        ])->assignRole('admin');


        User::create([
            'name' => 'kodrat',
            'email' => 'kodrat@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password') // password
        ])->assignRole('user');
    }
}
