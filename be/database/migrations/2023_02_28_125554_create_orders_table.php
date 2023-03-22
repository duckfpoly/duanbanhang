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
        Schema::connection('mongodb')->create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('order_code')->nullable();
            $table->dateTime('order_date')->nullable();
            $table->tinyInteger('pay_method')->nullable();
            $table->tinyInteger('pay_status')->nullable();
            $table->integer('id_user')->nullable();
            $table->integer('id_product')->nullable();
            $table->float('price_product')->nullable();
            $table->integer('quantity')->nullable();
            $table->tinyInteger('toping')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
