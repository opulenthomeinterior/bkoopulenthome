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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number')->unique();
            $table->unsignedBigInteger('user_id')->nullable();

            // Delivery Details
            $table->string('first_name');
            $table->string('last_name');
            $table->string('mobile');
            $table->string('delivery_country');
            $table->string('postcode');
            $table->string('house_number')->nullable();
            $table->string('street_address');
            $table->string('address_line2')->nullable();
            $table->string('city');
            $table->string('order_reference')->nullable();
            $table->date('delivery_date')->nullable();

            // Account Details
            $table->string('contact_first_name')->nullable();
            $table->string('contact_last_name')->nullable();
            $table->string('contact_company_name')->nullable();
            $table->string('contact_email_address')->nullable();
            $table->string('contact_mobile_number')->nullable();
            

            // Card Holder Details
            $table->enum('payment_method', ['card', 'paypal', 'klarna']);
            $table->string('cardholder_name')->nullable();
            $table->string('cardholder_email')->nullable();
            $table->string('cardholder_mobile')->nullable();
            $table->string('cardholder_address')->nullable();
            $table->string('cardholder_address_line2')->nullable();
            $table->string('cardholder_city')->nullable();
            $table->string('cardholder_country')->nullable();
            $table->string('cardholder_postcode')->nullable();

            // Stripe payment details
            $table->string('session_id')->nullable();
            $table->string('currency')->default('usd');
            $table->string('payment_intent_id')->nullable();
            $table->string('payment_status')->nullable();
            $table->decimal('total_amount', 10, 2);
            
            $table->json('order_items');
            $table->string('order_status')->default('pending');
            
            // customer details
            $table->string('customer_name');
            $table->string('customer_email');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
