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
        Schema::connection('mongodb')->create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name_product',255)->nullable();
            $table->string('image_product',255)->nullable();
            $table->string('image_product_2',255)->nullable();
            $table->string('image_product_3',255)->nullable();
            $table->float('price_product')->nullable();
            $table->text('desc_sort')->nullable();
            $table->text('desc')->nullable();
            $table->string('created_by',255)->nullable();
            $table->string('updated_by',255)->nullable();
            $table->integer('id_category')->nullable();
            $table->tinyInteger('status')->default(0);
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
