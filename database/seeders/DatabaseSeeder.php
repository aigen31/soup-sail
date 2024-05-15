<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\User;
use App\Models\UserPrivileges;
use App\Models\UserRole;
use App\Models\Wallet;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 */
	public function run(): void
	{
		Company::factory(7)
			->hasImage()
			->hasLicenses(3)
			->create();

		User::factory()
		->create([
				'email' => 'aigen.chernogorsk@yandex.ru',
				'user_role_id' => 1
			]);

		User::factory()
		->create([
				'email' => 'business_owner@mie.ru',
				'user_role_id' => 3,
				'wallet_id' => 1
			]);

		UserRole::create([
				'name' => 'Admin'
			]);

		UserRole::create([
				'name' => 'Bussiness Owner'
			]);

		UserRole::create([
				'name' => 'Specialist'
			]);

		UserPrivileges::create([
			'user_role_id' => 1,
			'can_all' => true,
			'can_responce_by_support' => true,
		]);

		UserPrivileges::create([
			'user_role_id' => 2,
			'can_look_all_tasks' => true,
			'can_make_posts' => true,
		]);

		UserPrivileges::create([
			'user_role_id' => 3,
			'can_all' => true,
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
