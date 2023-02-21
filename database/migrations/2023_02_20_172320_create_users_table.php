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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password_hash');
            $table->string('password_plain');
            $table->boolean('superadmin')->default(false);
            $table->string('shop_name');
            $table->rememberToken();
            $table->timestamp('created_at')->default('now');
            $table->timestamp('updated_at')->nullable();
            $table->string('card_brand');
            $table->string('card_last_four');
            $table->timestamp('trial_ends_at')->nullable();
            $table->string('shop_domain');
            $table->boolean('is_enabled')->default(true);
            $table->string('billing_plan');
            $table->timestamp('trial_starts_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
