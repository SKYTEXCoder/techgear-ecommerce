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
        Schema::create('brands_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brand_id')->constrained('brands', 'id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('product_id')->constrained('products', 'id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->unique(['brand_id', 'product_id'], 'unique_brand_product');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brands_products');
    }
};
