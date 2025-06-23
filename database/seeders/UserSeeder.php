<?php

namespace Database\Seeders;

use App\Models\User;
use App\Enums\RolesEnum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Joe Goldberg',
            'email' => 'joegoldberg@example.com',
            'password' => bcrypt('password123'),
        ])->assignRole(RolesEnum::User->value);
        User::factory()->create([
            'name' => 'Dexter Morgan',
            'email' => 'dextermorgan@example.com',
            'password' => bcrypt('password123'),
        ])->assignRole(RolesEnum::Admin->value);
        User::factory()->create([
            'name' => 'Dandy Arya Akbar',
            'email' => 'dandyarya003@gmail.com',
            'password' => bcrypt('password123'),
        ])->assignRole(RolesEnum::Admin->value);
        User::factory()->create([
            'name' => 'Muhammad Hafizh Rifan',
            'email' => 'rifan@gmail.com',
            'password' => bcrypt('hafizhrifan123'),
        ])->assignRole(RolesEnum::User->value);
        User::factory()->create([
            'name' => 'Danar Priyo Utomo',
            'email' => 'danarpriyoutomo@gmail.com',
            'password' => bcrypt('danar123'),
        ])->assignRole(RolesEnum::Admin->value);
        User::factory()->create([
            'name' => 'Adhitya Wardhana',
            'email' => 'adhityawardhana@gmail.com',
            'password' => bcrypt('adhit123'),
        ])->assignRole(RolesEnum::User->value);
    }
}
