<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class HistoryOrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
                 'order_id' => $this->faker->numberBetween(1,8),
                 'user_phone' => $this->faker->numerify('##########'),
                'delivery_address' => $this->faker->address(),
                'created_date' => "2023-06-27",
                'price' => "100.000",
                'status' => 'success',
        ];
    }
}
