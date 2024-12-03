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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            // $table->boolean('is_verified')->default(0);
            $table->string('password');
            $table->string('image_path')->nullable();
            $table->string('phonenumber')->nullable();
            $table->string('worknumber')->nullable();
            $table->string('company_name')->nullable();
            $table->string('role_in_company')->nullable();
            $table->string('vat')->nullable();
            $table->string('company_website')->nullable();
            $table->string('company_type')->nullable(); //tradesperson contractor landlord
            $table->string('eori_number')->nullable();
            $table->string('country')->nullable();
            $table->string('postcode')->nullable();
            $table->string('house')->nullable();
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->string('city')->nullable();
            $table->rememberToken()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};