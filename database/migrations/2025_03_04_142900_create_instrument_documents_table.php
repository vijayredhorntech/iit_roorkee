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
        Schema::create('instrument_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('instrument_id')->constrained('instruments')->onDelete('cascade');
            $table->json('instrument_photos')->nullable(); // JSON type for multiple images
            $table->text('operation_manual')->nullable();
            $table->text('service_manual')->nullable();
            $table->text('additional_documents')->nullable();
            $table->text('video_links')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instrument_documents');
    }
};
