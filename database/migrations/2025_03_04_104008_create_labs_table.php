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
        Schema::create('labs', function (Blueprint $table) {
            $table->id();            
            // $table->string('lab_photos')->nullable(); // Store multiple photos as JSON
            $table->json('lab_photos')->nullable();
            $table->string('name')->nullable();
            $table->string('department')->nullable();
            $table->string('building')->nullable();
            $table->string('floor')->nullable();
            $table->string('room_number')->nullable();
            $table->string('lab_type')->nullable();
            $table->string('lab_manager')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('working_hours')->nullable();
            $table->integer('maximum_capacity')->nullable();
            $table->text('description')->nullable();
            $table->text('safety_guidelines')->nullable();
            $table->text('special_requirements')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->boolean('action')->default(1); // Default enabled
            $table->boolean('login_status')->default(0); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('labs');
    }
};
