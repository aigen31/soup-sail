<?php

namespace Database\Seeders;

use App\Models\ProjectTaskStatus;
use Illuminate\Database\Seeder;

class ProjectTaskStatusSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    ProjectTaskStatus::create([
      'name' => 'Under consideration',
    ]);

    ProjectTaskStatus::create([
      'name' => 'Performed',
    ]);

    ProjectTaskStatus::create([
      'name' => 'Waiting of Work Check',
    ]);

    ProjectTaskStatus::create([
      'name' => 'Ready',
    ]);

    ProjectTaskStatus::create([
      'name' => 'Ended',
    ]);

    ProjectTaskStatus::create([
      'name' => 'Aborted',
    ]);
  }
}
