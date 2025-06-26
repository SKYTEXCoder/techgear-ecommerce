<?php

use App\Models\User;
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
            $table->string('title', 2000);
            $table->string('slug', 2000)->unique();
            $table->longText('description');
            $table->foreignId('department_id')->index()->constrained('departments', 'id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('category_id')->index()->constrained('categories', 'id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->decimal('final_price', 20, 2);
            $table->string('status')->index();
            $table->unsignedInteger('stock_amount', autoIncrement: false)->default(1)->nullable();
            $table->unsignedInteger('sold_amount')->default(0)->after('stock_amount');
            $table->foreignIdFor(User::class, 'created_by');
            $table->foreignIdFor(User::class, 'updated_by');
            $table->boolean('is_active')->default(true);
            $table->boolean('is_featured')->default(false);
            $table->boolean('in_stock')->default(true);
            $table->boolean('on_sale')->default(false);
            $table->decimal('rating', 2, 1)->default(0.0);
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
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
