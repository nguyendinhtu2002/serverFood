<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user_phone=User::pluck('phone');
        return [
            'user_phone'=>$this->faker->randomElement($user_phone),
            'food_id'=>$this->faker->randomNumber(1,10),
            'food_name'=>$this->faker->word(),
            'quantity'=>'2',
            'discount'=>'0',
        ];
    }
}
