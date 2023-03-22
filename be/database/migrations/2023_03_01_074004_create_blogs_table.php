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
        Schema::connection('mongodb')->create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title_blog',255)->nullable();
            $table->string('image_blog')->nullable();
            $table->string('content_blog')->nullable();
            $table->string('create_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
