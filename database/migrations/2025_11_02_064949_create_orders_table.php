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

            $table->string('customer_name')->nullable();
            $table->string('customer_contact')->nullable();
            $table->string('customer_email')->nullable();
            $table->string('billing_address')->nullable();
            $table->string('billing_city')->nullable();
            $table->string('shipping_address');
            $table->string('shipping_city');
            $table->string('order_date')->nullable();
            $table->string('sub_total', 10, 2)->nullable();
            $table->string('discount', 10, 2)->nullable();
            $table->string('grand_total', 10, 2)->nullable();
            $table->string('delivery_date')->nullable();
            $table->string('order_status')->default(0)
                ->comment('0=pending, 1=accepted, 2=delivered, 3=canceled');
            $table->string('cart_details')->nullable();

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
