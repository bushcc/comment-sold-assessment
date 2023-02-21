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
            $table->integer('product_id');
            $table->integer('inventory_id');
            $table->text('street_address');
            $table->text('apartment');
            $table->text('city');
            $table->text('state');
            $table->string('country_code');
            $table->text('zip');
            $table->string('phone_number');
            $table->text('email');
            $table->string('name');
            $table->string('order_status');
            $table->text('payment_ref')->nullable();
            $table->string('transaction_id')->nullable();
            $table->integer('payment_amt_cents');
            $table->integer('ship_charged_cents')->nullable();
            $table->integer('ship_cost_cents')->nullable();
            $table->integer('subtotal_cents');
            $table->integer('total_cents');
            $table->text('shipper_name');
            $table->timestamp('payment_date')->nullable();
            $table->timestamp('shipped_date')->nullable();
            $table->text('tracking_number')->nullable();
            $table->integer('tax_total_cents');
            $table->timestamp('created_at')->default('now');
            $table->timestamp('updated_at')->nullable();
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
