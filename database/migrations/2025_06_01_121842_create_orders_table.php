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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->string('adress');
            $table->string('status')->default('created');

            $table->unsignedBigInteger('user_id');
            $table->index('user_id', 'user_product_order_idx');
            $table->foreign('user_id', 'user_product_order_fk')->on('users')->references('id');

            $table->unsignedBigInteger('product_id');
            $table->index('product_id', 'product_user_order_idx');
            $table->foreign('product_id', 'product_user_order_fk')->on('products')->references('id');

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
