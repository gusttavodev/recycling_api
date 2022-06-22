<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DiscardFactory extends Factory
{
    public function definition()
    {
        return [
            'quantity' => $this->faker->randomDigitNotNull(1, 5),
            'date'     => $this->faker->dateTimeBetween('-3 week', '+3 week')
        ];
    }
}
