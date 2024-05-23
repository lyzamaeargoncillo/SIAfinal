<?php


namespace Database\Factories;

use App\Models\Flight;
use Illuminate\Database\Eloquent\Factories\Factory;

class FlightFactory extends Factory
{
    protected $model = Flight::class;

    public function definition()
    {
        return [
            'flight_no' => $this->faker->unique()->randomNumber(5),
            'departure_city' => $this->faker->city,
            'arrival_city' => $this->faker->city,
            'departure_time' => $this->faker->dateTimeBetween('now', '+1 week'),
            'arrival_time' => $this->faker->dateTimeBetween('+1 week', '+2 weeks'),
        ];
    }
}

