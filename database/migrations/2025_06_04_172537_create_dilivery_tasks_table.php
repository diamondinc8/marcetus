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
        Schema::create('dilivery_tasks', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('order_id');
            $table->index('order_id', 'product_assembling_task_idx');
            $table->foreign('order_id', 'product_assembling_task_fk')->on('orders')->references('id');

            $table->unsignedBigInteger('assembling_task_id');
            $table->index('assembling_task_id', 'assembling_product_task_idx');
            $table->foreign('assembling_task_id', 'assembling_product_task_fk')->on('assembling_tasks')->references('id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dilivery_tasks');
    }
};
