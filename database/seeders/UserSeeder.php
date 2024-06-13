<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      User::firstOrCreate([
        'name' => 'Admin',
        'email' => 'admin@mie.ru',
        'password' => Hash::make('password'),
        'user_role_id' => 1,
      ]);
  
      User::firstOrCreate([
        'name' => 'Moderator',
        'email' => 'moderator@mie.ru',
        'password' => Hash::make('password'),
        'user_role_id' => 2,
      ]);

      User::firstOrCreate([
        'name' => 'Business Owner',
        'email' => 'business_owner@mie.ru',
        'password' => Hash::make('password'),
        'company_id' => 1,
        'user_role_id' => 3,
      ]);

      User::firstOrCreate([
        'name' => 'Specialist',
        'email' => 'specialist@mie.ru',
        'password' => Hash::make('password'),
        'user_role_id' => 4,
      ]);
    }
}
