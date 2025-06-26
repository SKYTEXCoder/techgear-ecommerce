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
        Schema::create('brand_brand_type', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brand_id')->constrained('brands', 'id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('brand_type_id')->constrained('brand_types', 'id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
            $table->unique(['brand_id', 'brand_type_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brand_brand_type');
    }
};
