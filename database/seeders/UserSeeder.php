<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("users")->delete();

        // Create admin user
        User::create([
            'name' => 'Amine Abdellah',
            'email' => 'amine.abdellah@usms.test',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'remember_token' => \Str::random(10),
        ]);

        // Create some regular users
        User::create([
            'name' => 'taha scolarite',
            'email' => 'taha.scolarite@usms.test',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'remember_token' => \Str::random(10),
        ]);

    }
}
