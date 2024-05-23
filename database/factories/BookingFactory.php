<?php

namespace Database\Factories;

use App\Models\Flight;
use App\Models\Passenger;
use App\Models\Booking;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookingFactory extends Factory
{
    protected $model = Booking::class;

    public function definition()
    {
        return [
            'flightId' => Flight::factory(),
            'passengerId' => Passenger::factory(),
            'seat_no' => $this->faker->randomLetter . $this->faker->randomNumber(2),
        ];
    }
}
