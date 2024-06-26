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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->fulltext();
            $table->string('last_name')->fulltext();
            $table->string('middle_name')->nullable()->fulltext();
            $table->string('retailer_name')->nullable()->fulltext();
            $table->fulltext(['first_name', 'last_name', 'middle_name']);
            $table->string('phone')->unique()->nullable();
            $table->string('email')->unique();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
