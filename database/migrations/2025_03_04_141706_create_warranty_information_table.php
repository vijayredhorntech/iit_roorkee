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
        Schema::create('warranty_information', function (Blueprint $table) {
            $table->id();
            $table->foreignId('instrument_id')->constrained('instruments')->onDelete('cascade');
            $table->date('manufacturing_date')->nullable();
            $table->date('installation_date')->nullable();
            $table->integer('warranty_period_months')->nullable();
            $table->date('next_service_due_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warranty_information');
    }
};
