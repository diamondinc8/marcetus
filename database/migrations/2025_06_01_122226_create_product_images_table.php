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
        Schema::create('product_images', function (Blueprint $table) {
            $table->id();


            $table->unsignedBigInteger('image_id');
            $table->index('image_id', 'image_product_idk');
            $table->foreign('image_id', 'image_product_fk')->on('images')->references('id');


            $table->unsignedBigInteger('product_id');
            $table->index('product_id', 'product_image_idx');
            $table->foreign('product_id', 'product_iamge_fk')->on('products')->references('id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_images');
    }
};
