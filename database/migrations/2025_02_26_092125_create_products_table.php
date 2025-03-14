<?php

use App\Models\Category;
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
            $table->string('name');
            $table->text('description');
            $table->foreignIdFor(Category::class, 'category_id')->nullable()->constrained()->nullOnDelete();
            $table->decimal('price', 10, 2);
            $table->text('img_url')->nullable();
            $table->integer('volume');
            $table->enum('unit', ['ml', 'cl', 'l', 'fl oz', 'g', 'pcs']);
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
