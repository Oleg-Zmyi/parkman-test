<?php

namespace Database\Factories;

use App\Models\Garage;
use Illuminate\Database\Eloquent\Factories\Factory;

class GarageFactory extends Factory
{
    protected $model = Garage::class;

    public function definition()
    {
        return [
            'garage_owner' => $this->faker->randomElement(['AutoPark', 'NewPark']),
            'name' => 'Garage 1',
            'owner_id' => $this->faker->randomDigitNotZero(),
            'hourly_price' => $this->faker->randomFloat(2, 0, 50),
            'currency' => $this->faker->currencyCode(),
            'country' => $this->faker->randomElement(['Finland', 'Ukraine']),
            'contact_email' => $this->faker->email(),
            'latitude' => $this->faker->randomElement([60.16444996645511, 24.930162952045407]),
            'longitude' => $this->faker->randomElement([49.833325, 24.021660]),
        ];
    }
}
