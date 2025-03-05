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
        Schema::create('service_engineer_information', function (Blueprint $table) {
            $table->id();
            $table->foreignId('instrument_id')->constrained('instruments')->onDelete('cascade');
            $table->string('service_engineer_name')->nullable();
            $table->string('service_engineerphone_number')->nullable();
            $table->string('service_engineeremail')->nullable();
            $table->string('company')->nullable();
            $table->text('address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_engineer_information');
    }
};
