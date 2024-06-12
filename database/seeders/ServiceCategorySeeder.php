<?php

namespace Database\Seeders;

use App\Models\ServiceCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceCategorySeeder extends Seeder
{
  public $categories = [
    [
      'id' => 1,
      'name' => 'Web Development and Design',
    ],
    [
      'id' => 2,
      'parent_category_id' => 1,
      'name' => 'Web-Site and Application Development',
    ],
    [
      'id' => 3,
      'name' => 'Digital Marketing and Advestering',
    ],
  ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      foreach ($this->categories as $category) {
        ServiceCategory::firstOrCreate($category);
      }
    }
}
