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
        Schema::create('instruments', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('model_number')->nullable();
            $table->string('serial_number')->nullable();
            $table->string('asset_id')->nullable();
            $table->string('inventory_number')->nullable();
            $table->string('category_type')->nullable();
            $table->foreignId('lab_id')->constrained('labs')->onDelete('cascade');
            $table->string('operation_status')->nullable();
            $table->decimal('per_hour_cost', 10, 2)->nullable();
            $table->integer('minimum_booking_duration')->nullable();
            $table->integer('maximum_booking_duration')->nullable();
            $table->text('description')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instruments');
    }
};
