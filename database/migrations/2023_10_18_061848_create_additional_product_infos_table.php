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
        Schema::create('additional_product_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->cascadeOnDelete();
            $table->string('stand_up')->default('N/A');
            $table->string('folded_w_o_wheels')->default('N/A');
            $table->string('folded_w_wheels')->default('N/A');
            $table->string('door_pass_through')->default('N/A');
            $table->string('frame')->default('N/A');
            $table->string('weight')->default('N/A');
            $table->string('capacity')->default('N/A');
            $table->string('width')->default('N/A');
            $table->string('height')->default('N/A');
            $table->string('handle_height')->default('N/A');
            $table->string('wheels')->default('N/A');
            $table->string('seat_back_height')->default('N/A');
            $table->string('head_room')->default('N/A');
            $table->string('color')->default('N/A');
            $table->string('size')->default('N/A');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('additional_product_infos');
    }
};
