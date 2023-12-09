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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('vendor_id');
            $table->unsignedBigInteger('cart_id');
            $table->foreign('vendor_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('cart_id')->references('id')->on('carts')->onDelete('cascade');
            $table->string('invoice_number');
            $table->dateTime('due_date');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('company_name')->nullable();
            $table->text('address_line_1');
            $table->text('address_line_2')->nullable();
            $table->string('country');
            $table->string('city');
            $table->string('zip_code');
            $table->string('phone');
            $table->string('email');
            $table->longText('additional_information')->nullable();
            $table->string('payment_method');
            $table->string('payment_status')->default('unpaid'); // paid, unpaid
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
