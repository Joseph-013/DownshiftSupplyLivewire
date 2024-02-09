<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // public function up(): void
    // {
    //     Schema::create('orders', function (Blueprint $table) {
    //         $table->id();
    //         $table->foreignId('user_id');
    //         $table->string ('recipientName');
    //         $table->integer('contact')->unsigned();
    //         $table->enum('preferredService', ['Delivery', 'Pickup']);
    //         $table->string('shippingAddress')->nullable();
    //         $table->string('paymentOption');
    //         $table->string('proofOfPayment');
    //         $table->timestamp('purchaseDate')->default(now());
    //         $table->enum('status', ['Complete', 'On Hold', 'Processing', 'In Transit', 'Ready for Pickup', 'Returned', 'Cancelled'])->default('Processing');
    //         $table->decimal('grandTotal', 6, 2)->unsigned();
    //         $table->string('trackingNumber');
    //         $table->decimal('shippingFee', 6, 2)->unsigned();
    //         $table->timestamps();
    //     });
    // }

    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('firstName');
            $table->string('lastName');
            $table->bigInteger('contact')->unsigned();
            $table->timestamp('purchaseDate')->default(now());
            $table->enum('purchaseType', ['Onsite', 'Online']);
            $table->foreignId('user_id')->nullable();
            $table->enum('preferredService', ['Delivery', 'Pickup'])->nullable();
            $table->string('paymentOption')->nullable();
            $table->text('proofOfPayment')->nullable();
            $table->enum('status', ['Complete', 'On Hold', 'Processing', 'In Transit', 'Ready for Pickup', 'Returned', 'Cancelled'])->nullable();
            $table->string('shippingAddress')->nullable();
            $table->string('courierUsed')->nullable();
            $table->decimal('shippingFee', 6, 2)->unsigned()->nullable();
            $table->string('trackingNumber')->nullable();
            $table->decimal('grandTotal', 10, 2)->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
