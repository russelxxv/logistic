<?php

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
        Schema::create('order_return_items', function (Blueprint $table) {
            $table->id();
            $table->string('item_no')->index();
            $table->unsignedBigInteger('order_return_id')->index();
            $table->unsignedBigInteger('order_return_reason_id')->index();
            $table->longText('details')->nullable()->comment('Other Special notes / Instructions');
            $table->timestamps();
            $table->softDeletes();
            // $table->unsignedBigInteger('product_category_id')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_return_items');
    }
};
