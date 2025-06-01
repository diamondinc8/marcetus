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

            $table->string('title');
            $table->text('desctiprion')->nullable();
            $table->float('rating')->default(0);
            $table->integer('cost')->default(100);

            $table->unsignedBigInteger('seller_id');
            $table->index('seller_id', 'product_seller_idx');
            $table->foreign('seller_id', 'product_seller_fk')->on('sellers')->references('id');


            $table->unsignedBigInteger('category_id');
            $table->index('category_id', 'product_category_idx');
            $table->foreign('category_id', 'product_category_fk')->on('categories')->references('id');



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
