<?php

namespace Database\Seeders;

use App\Models\OrderReturnReason;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReturnReasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reasons = [
            ['reason' => 'Product and shipping box both damaged'],
            ['reason' => 'Wrong item sent'],
            ['reason' => 'No longer needed'],
            ['reason' => 'Inaccurate website description'],
            ['reason' => 'Defective item'],
            ['reason' => 'Damaged item'],
            ['reason' => 'Item arrived too late'],
            ['reason' => 'Brought by mistake'],
        ];

        foreach ($reasons as $reason) {
            OrderReturnReason::create($reason);
        }
    }
}
