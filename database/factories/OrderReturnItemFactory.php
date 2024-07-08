<?php

namespace Database\Factories;

use App\Models\OrderReturn;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderReturnItem>
 */
class OrderReturnItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'item_number' => fake()->randomNumber(),
            'order_return_id' => OrderReturn::all()->random(),
        ];
    }
}
