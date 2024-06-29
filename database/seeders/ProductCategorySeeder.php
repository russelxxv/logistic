<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Appliances'],
            ['name' => 'Electronics'],
            ['name' => 'Glass'],
            ['name' => 'Food'],
            ['name' => 'Clothing'],
            ['name' => 'Shoes'],
            ['name' => 'Accessories'],
            ['name' => 'Others'],
        ];

        foreach ($categories as $category) {
            ProductCategory::create($category);
        }
    }
}
