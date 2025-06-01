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
        Schema::create('responses', function (Blueprint $table) {
            $table->id();

            $table->integer('mark')->default(5);

            $table->text('pluses')->nullable();
            $table->text('minuses')->nullable();
            $table->text('comment')->nullable();

            $table->unsignedBigInteger('author_id');
            $table->index('author_id', 'product_respone_author_idx');
            $table->foreign('author_id', 'product_respone_author_fk')->on('users')->references('id');

            $table->unsignedBigInteger('product_id');
            $table->index('product_id', 'product_respone_idx');
            $table->foreign('product_id', 'product_respone_fk')->on('products')->references('id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('responses');
    }
};
