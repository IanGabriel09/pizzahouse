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
        Schema::create('pizza_orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_confirmation')->nullable();
            $table->string('name');
            $table->string('address');
            $table->string('email');
            $table->string('contact');
            $table->string('pizza_type');
            $table->string('pizza_size');
            $table->string('crust_type');
            $table->json('toppings')->nullable();
            $table->decimal('total_price', 8, 2);
            $table->string('delivery_driver')->nullable();
            $table->timestamps();
        });
        
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pizza_orders');
    }
};
