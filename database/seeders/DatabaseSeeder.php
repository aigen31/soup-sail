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

    $this->call([
      ProjectTaskStatusSeeder::class,
      UserSeeder::class,
      UserRoleSeeder::class,
      UserPrivilegesSeeder::class,
      ServiceCategorySeeder::class,
      ServicesSeeder::class,
      SpecialistStatusSeeder::class,
      SpecialistTypeSeeder::class,
    ]);
	}
}
