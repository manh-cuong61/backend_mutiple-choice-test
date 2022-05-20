<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ExamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text(200),
            'description' => $this->faker->text(),
            'time' => $this->faker->randomElement([30,45,60,90]),
        ];
    }
}
