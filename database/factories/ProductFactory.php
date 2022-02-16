<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'=>$this->faker->numberBetween(1, 21),
            'secondary_category_id'=>$this->faker->numberBetween(1, 21),
            'name'=>$this->faker->name,
            'comment'=>$this->faker->realText($maxNbChars = 100),
            'trade_type'=>$this->faker->numberBetween(0, 2),
            'address' =>$this->faker->address(),
            'status'=>$this->faker->numberBetween(0, 3),
        ];
    }
}
