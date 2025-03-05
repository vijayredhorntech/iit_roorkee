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
        Schema::create('purchase_information', function (Blueprint $table) {
            $table->id();
            $table->foreignId('instrument_id')->constrained('instruments')->onDelete('cascade');
            $table->string('manufacture_name')->nullable();
            $table->string('vendor_name')->nullable();
            $table->string('purchase_order_number')->nullable();
            $table->date('purchase_date')->nullable();
            $table->decimal('cost', 10, 2)->nullable();
            $table->string('funding_source')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_information');
    }
};
