<?php

namespace Database\Seeders;

use App\Models\OrderReturnReason;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReturnReasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OrderReturnReason::factory(10)->create();
    }
}
