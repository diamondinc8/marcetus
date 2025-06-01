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
        Schema::create('user_orders', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->index('user_id', 'user_order_idx');
            $table->foreign('user_id', 'user_order_fk')->on('users')->references('id');

            $table->unsignedBigInteger('order_id');
            $table->index('order_id', 'order_user_idx');
            $table->foreign('order_id', 'order_user_fk')->on('orders')->references('id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_orders');
    }
};
