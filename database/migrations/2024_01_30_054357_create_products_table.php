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
            $table->string('name', 100)->unique();
            $table->text('description');
            $table->decimal('price', 10, 2)->unsigned();
            $table->integer('stockquantity')->unsigned();
            $table->integer('criticallevel')->unsigned();
            $table->enum('status', ['Existing', 'Deleted'])->default('Existing')->nullable();
            $table->foreignId('category_id')->nullable()->constrained('product_categories');
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

/*

            [
                'name' => 'text',
                'description' => 'text',
                'price' => 999,
                'stockquantity' => 999,
                'criticallevel' => 3,
                'image' => 'URL',
            ],

*/
