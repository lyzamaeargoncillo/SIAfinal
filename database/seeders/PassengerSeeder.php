<?php

namespace Database\Seeders;

use App\Models\Passenger;
use Illuminate\Database\Seeder;

class PassengerSeeder extends Seeder
{
    public function run()
    {
        Passenger::factory()->count(10)->create();
    }
}
