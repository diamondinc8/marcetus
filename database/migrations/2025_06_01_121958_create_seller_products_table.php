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
        Schema::create('seller_products', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('seller_id');
            $table->index('seller_id', 'seller_products_idx');
            $table->foreign('seller_id', 'seller_products_fk')->on('sellers')->references('id');

            $table->unsignedBigInteger('product_id');
            $table->index('product_id', 'products_seller_idx');
            $table->foreign('product_id', 'products_seller_fk')->on('products')->references('id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seller_products');
    }
};
