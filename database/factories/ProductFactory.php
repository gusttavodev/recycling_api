<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition()
    {
        return [
            'name'        => $this->faker->name(),
            'description' => $this->faker->text(),
            'enable'      => $this->faker->boolean(),
        ];
    }
}
