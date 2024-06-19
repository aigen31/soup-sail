<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecialistStatusUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('specialist_type_user')->insert([
          'user_id' => 5,
          'type_id' => 1,
        ]);

        DB::table('specialist_type_user')->insert([
          'user_id' => 4,
          'type_id' => 2,
        ]);

        DB::table('specialist_type_user')->insert([
          'user_id' => 6,
          'type_id' => 2,
        ]);
    }
}
