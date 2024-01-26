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
            $table->string('name');
            $table->text('description');
            $table->string('brand');
            $table->string('categories');
            $table->string('hierarchicalCategories');
            $table->string('type');
            $table->float('price');
            $table->string('price_range');
            $table->text('image');
            $table->text('url');
            $table->boolean('free_shipping');
            $table->integer('popularity');
            $table->integer('rating');
            $table->string('objectID');
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
