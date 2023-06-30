<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FoodFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->name,
            'image'=>$this->faker->name,
            'description'=>$this->faker->title,
            'price'=>'100.000',
            'discount'=>"0",
            'menu_id'=>$this->faker->numberBetween(1,10),
        ];
    }
}
