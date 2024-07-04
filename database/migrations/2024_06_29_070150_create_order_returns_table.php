<?php

use App\Enums\ReturnOrderStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order_returns', function (Blueprint $table) {
            $table->id();
            $table->string('order_number');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('order_return_reason_id');
            $table->longText('details')->nullable()->comment('Other Special notes / Instructions');
            $table->enum('status', [ReturnOrderStatus::NEW->value, ReturnOrderStatus::RECEIVED->value]);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_returns');
    }
};
