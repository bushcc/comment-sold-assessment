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
            $table->string('product_name');
            $table->text('description');
            $table->text('style');
            $table->text('brand');
            $table->timestamp('created_at')->default('now');
            $table->timestamp('updated_at')->nullable();
            $table->string('url');
            $table->string('product_type');
            $table->integer('shipping_price');
            $table->text('note');
            $table->integer('admin_id');
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
