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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_code');
            $table->string('short_title')->nullable();
            $table->string('slug')->nullable();
            $table->string('full_title')->nullable();
            $table->text('product_description')->nullable();
            $table->decimal('price', 20, 2);
            $table->decimal('discounted_price', 20, 2)->nullable();
            $table->decimal('discounted_percentage')->nullable();
            $table->unsignedBigInteger('parent_category_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('style_id')->nullable();
            $table->unsignedBigInteger('colour_id')->nullable();
            $table->unsignedBigInteger('assembly_id')->nullable();
            $table->decimal('height', 20, 2)->nullable();
            $table->decimal('width', 20, 2)->nullable();
            $table->decimal('depth', 20, 2)->nullable();
            $table->decimal('length', 20, 2)->nullable();
            $table->decimal('weight', 20, 2)->nullable();
            $table->string('dimensions')->nullable();
            $table->string('image_path')->nullable();
            $table->timestamps();

            $table->foreign('parent_category_id')->references('id')->on('categories')->nullOnDelete();
            $table->foreign('category_id')->references('id')->on('categories')->nullOnDelete();
            $table->foreign('style_id')->references('id')->on('styles')->nullOnDelete();
            $table->foreign('colour_id')->references('id')->on('colours')->nullOnDelete();
            $table->foreign('assembly_id')->references('id')->on('assemblies')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
