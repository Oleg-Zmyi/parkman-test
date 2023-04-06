<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Garage;

class GarageSeeder extends Seeder
{
    public function run()
    {
        Garage::factory()->count(10)->create();
    }
}
