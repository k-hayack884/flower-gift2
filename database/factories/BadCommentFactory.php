<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BadCommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'=>$this->faker->numberBetween(1, 20),
            'comment_id'=>$this->faker->numberBetween(1, 100),
            'reason'=>$this->faker->realText($maxNbChars = 100),
        ];
    }
}
