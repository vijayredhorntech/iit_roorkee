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
        Schema::create('instrument_accessories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('instrument_id')->constrained()->onDelete('cascade');
            $table->string('accessoryType')->nullable();
            $table->string('name');
            $table->string('modelNumber')->nullable();
            $table->string('serialNumber')->nullable();
            $table->text('purpose')->nullable();
            $table->integer('quantity')->default(1);
            $table->enum('status', ['working', 'not working'])->default('working');
            $table->date('purchase_date')->nullable();
            $table->integer('warranty_period')->nullable(); // in months
            $table->json('photos')->nullable();
            $table->string('manual')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instrument_accessories');
    }
};
