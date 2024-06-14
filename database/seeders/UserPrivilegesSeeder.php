<?php

namespace Database\Seeders;

use App\Models\UserPrivileges;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserPrivilegesSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    UserPrivileges::create([
      'user_role_id' => 1,
      'can_all' => true,
      'can_responce_by_support' => true,
    ]);

    UserPrivileges::create([
      'user_role_id' => 2,
      'can_look_all_tasks' => true,
      'can_make_posts' => true,
      'can_delegate_performer' => true,
      'can_responce_by_support' => true,
    ]);

    UserPrivileges::create([
      'user_role_id' => 3,
      'can_create_tasks' => true,
      'can_order_service' => true,
      'can_ask_question' => true,
      'wallet_access' => true,
      'allow_delegate_access' => true,
    ]);

    UserPrivileges::create([
      'user_role_id' => 4,
      'can_look_delegate_tasks' => true,
    ]);
  }
}
