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
        Schema::create('pi_user_meta', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('pi_id'); // Foreign key (User ID)
            $table->string('title')->nullable();
            $table->string('last_name')->nullable();
            $table->string('department')->nullable();
            $table->string('designation')->nullable();
            $table->string('alt_email')->nullable();
            $table->text('address')->nullable(); 
            $table->string('phone_number')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('lab_number')->nullable();
            $table->string('specialization')->nullable();
            $table->string('academica')->nullable();
            $table->date('date_of_joining')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->boolean('action')->default(1); // Default enabled
            $table->boolean('login_status')->default(0); // Default disabled
            $table->timestamps();

            // Foreign key constraint (assuming 'users' table exists)
            $table->foreign('pi_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pi_user_meta');
    }
};
