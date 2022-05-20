<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UserExamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'number_of_times' => $this->faker->numberBetween(1, 5),
            'time_out' => $this->faker->numberBetween(10, 90),
        ];
    }
}
