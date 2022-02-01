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
            'reviewer_id'=>$this->faker->numberBetween(1, 2),
            'reviewee_id'=>$this->faker->numberBetween(1, 2),
            'review'=>$this->faker->numberBetween(1, 3),
            'status'=>$this->faker->numberBetween(0, 1),
        ];
    }
}
