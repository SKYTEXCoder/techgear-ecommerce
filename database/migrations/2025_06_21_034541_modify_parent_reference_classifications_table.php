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
        Schema::table('parent_reference_classifications', function (Blueprint $table) {
            $table->string('classification_description')->nullable()->after('classification_name');
            $table->boolean('is_active')->default(true);
            $table->unique(['referenceable_id', 'referenceable_type', 'classification_name'], 'unique_parent_reference_classifications');
            $table->index(['referenceable_id', 'referenceable_type'], 'parent_reference_classifications_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('parent_reference_classifications', function (Blueprint $table) {
            $table->dropColumn('classification_description');
            $table->dropColumn('is_active');
            $table->dropUnique('unique_parent_reference_classifications');
            $table->dropIndex('parent_reference_classifications_index');
        });
    }
};
