<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'reviewer_id'=>$this->faker->numberBetween(1, 5),
            'reviewee_id'=>$this->faker->numberBetween(1, 5),
            'review'=>$this->faker->numberBetween(1, 3),
        ];
    }
}
