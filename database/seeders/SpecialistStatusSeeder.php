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
        SpecialistStatus::create([
          'name' => 'Ready for work',
        ]);
        
        SpecialistStatus::create([
          'name' => 'Is busy',
        ]);
    }
}
