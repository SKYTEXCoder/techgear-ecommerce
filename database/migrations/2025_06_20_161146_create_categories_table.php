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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('slug')->unique();
            $table->string('image')->nullable();
            $table->unsignedInteger('depth')->default(0);
            $table->foreignId('department_id')->index()->constrained('departments', 'id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('parent_category_id')->nullable()->index()->constrained('categories', 'id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->json('filterable_specifications')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
