<?php

namespace Database\Seeders;

use App\Models\SpecialistStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecialistStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // SpecialistStatus::firstOrCreate([
        //   'name' => 'Ready for work',
        //   'user_id' => 4
        // ]);

        // SpecialistStatus::firstOrCreate([
        //   'name' => 'Ready for work',
        //   'user_id' => 5
        // ]);
        
        // SpecialistStatus::firstOrCreate([
        //   'name' => 'Is busy',
        //   'user_id' => 6
        // ]);

        SpecialistStatus::firstOrCreate([
          'name' => 'Ready for work',
        ]);
        
        SpecialistStatus::firstOrCreate([
          'name' => 'Is busy',
        ]);
    }
}
