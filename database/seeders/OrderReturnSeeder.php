<?php

namespace Database\Seeders;

use App\Models\Address\Address;
use App\Models\Customer;
use App\Models\OrderReturn;
use App\Models\OrderReturnItem;
use App\Models\OrderReturnProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderReturnSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $customer = Customer::factory(50)->create();
        $address = Address::factory(50)->create();
        $orderReturn = OrderReturn::factory(50)->create();
        $returnItem = OrderReturnItem::factory(100)->create();
        $orderCategory = OrderReturnProductCategory::factory(100)->create();
    }
}
