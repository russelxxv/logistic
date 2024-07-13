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
        Schema::create('ph_cities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code', 50);
            $table->string('zip_code', 20)->nullable();
            $table->string('district')->nullable();
            $table->unsignedBigInteger('region_id');
            $table->unsignedBigInteger('province_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ph_cities');
    }
};
