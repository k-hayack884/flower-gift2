<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'product_id'=>$this->faker->numberBetween(1, 100),
            'user_id'=>$this->faker->numberBetween(1, 2),
            'comment'=>$this->faker->realText($maxNbChars = 100),
            'status'=>$this->faker->numberBetween(0, 1),
        ];
    }
}
