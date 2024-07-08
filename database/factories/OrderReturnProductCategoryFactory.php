<?php

namespace Database\Factories;

use App\Models\OrderReturn;
use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderReturnProductCategory>
 */
class OrderReturnProductCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_return_id' => OrderReturn::all()->random(),
            'product_category_id' => ProductCategory::all()->random(),
        ];
    }
}
