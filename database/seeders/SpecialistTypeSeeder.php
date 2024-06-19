<?php

namespace Database\Seeders;

use App\Models\SpecialistType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecialistTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // SpecialistType::create([
        //   'name' => 'Full-time',
        //   'user_id' => 5
        // ]);
        
        // SpecialistType::create([
        //   'name' => 'Freelance',
        //   'user_id' => 4
        // ]);

        // SpecialistType::create([
        //   'name' => 'Freelance',
        //   'user_id' => 6
        // ]);

        SpecialistType::create([
          'name' => 'Full-time',
        ]);

        SpecialistType::create([
          'name' => 'Freelance',
        ]);
    }
}
