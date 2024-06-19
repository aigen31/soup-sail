<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecialistTypeUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      DB::table('specialist_status_user')->insert([
        'user_id' => 5,
        'status_id' => 1,
      ]);

      DB::table('specialist_status_user')->insert([
        'user_id' => 4,
        'status_id' => 1,
      ]);

      DB::table('specialist_status_user')->insert([
        'user_id' => 6,
        'status_id' => 2,
      ]);
    }
}
