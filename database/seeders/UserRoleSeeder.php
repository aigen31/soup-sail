<?php

namespace Database\Seeders;

use App\Models\UserRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    UserRole::create([
      'name' => 'Admin',
      'hierarchy' => 0,
    ]);

    UserRole::create([
      'name' => 'Moderator',
      'hierarchy' => 1,
    ]);

    UserRole::create([
      'name' => 'Bussiness Owner',
      'hierarchy' => 2,
    ]);

    UserRole::create([
      'name' => 'Specialist',
      'hierarchy' => 2,
    ]);
  }
}
