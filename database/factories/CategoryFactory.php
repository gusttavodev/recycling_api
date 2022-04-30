<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    public function definition()
    {
        return [
            'name'   => $this->faker->name(),
            'color'  => $this->faker->safeHexColor(),
            'enable' => $this->faker->boolean(),
        ];
    }
}
