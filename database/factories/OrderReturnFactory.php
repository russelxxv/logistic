<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\OrderReturnReason;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderReturn>
 */
class OrderReturnFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_number' => fake()->randomNumber(),
            'customer_id' => Customer::all()->random(),
            'order_return_reason_id' => OrderReturnReason::all()->random(),
            'details' => fake()->sentence(6),
        ];
    }
}
