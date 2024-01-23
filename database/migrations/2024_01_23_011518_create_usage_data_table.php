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
        Schema::create('usage_data', function (Blueprint $table) {
            $table->id();
            $table->integer('billing_period');
            $table->integer('total_units')->nullable();
            $table->integer('total_minutes')->nullable();
            $table->integer('total_letters')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usage_data');
    }
};
