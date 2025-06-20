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
        Schema::create('parent_reference_classifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('referenceable_id');
            $table->string('referenceable_type');
            $table->string('referenceable_column');
            $table->string('classification_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parent_reference_classifications');
    }
};
