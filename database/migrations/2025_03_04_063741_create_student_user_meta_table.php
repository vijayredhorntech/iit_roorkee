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
        Schema::create('student_user_meta', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pi_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('sid')->constrained('users')->onDelete('cascade');
            $table->string('lastname')->nullable();
            $table->string('student_id')->unique();
            $table->string('department')->nullable();
            $table->integer('student_year')->nullable();
            $table->string('altemail')->nullable();
            $table->string('mobile_number')->nullable();
            $table->text('research_area')->nullable();
            $table->text('address')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->boolean('action')->default(1); // Default enabled
            $table->boolean('login_status')->default(0); // Default disabled
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_user_meta');
    }
};
