<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServicesSeeder extends Seeder
{
  public $services = [
    [
      'name' => 'Landing',
      'service_category_id' => 2,
      'price' => 1000,
      'description' => 'Something Desctiprion 1',
    ],
    [
      'name' => 'Corporate Site',
      'service_category_id' => 2,
      'price' => 2000,
      'description' => 'Something Desctiprion 2',
    ],
    [
      'name' => 'E-commerce',
      'service_category_id' => 2,
      'price' => 3000,
      'description' => 'Something Desctiprion 3',
    ],
    [
      'name' => 'Individual Solution',
      'service_category_id' => 2,
      'price' => 4000,
      'description' => 'Something Desctiprion 4',
    ],
  ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      foreach ($this->services as $service) {
        Service::firstOrCreate($service);
      }
    }
}
