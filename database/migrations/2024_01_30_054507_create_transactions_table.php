<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('firstName', 100)->nullable();
            $table->string('lastName', 100)->nullable()->nullable();
            $table->bigInteger('contact')->unsigned()->nullable();
            $table->enum('purchaseType', ['Onsite', 'Online'])->nullable();
            $table->foreignId('user_id')->nullable()->constrained('users'); //nullable
            $table->enum('preferredService', ['Delivery', 'Pickup'])->nullable(); //nullable
            $table->string('paymentOption', 50)->nullable(); //nullable
            $table->text('proofOfPayment')->nullable(); //nullable
            $table->enum('status', ['Processing', 'On Hold', 'Cancelled', 'Returned', 'In Transit', 'Ready for Pickup', 'Completed'])->nullable(); //nullable
            $table->string('shippingAddress', 100)->nullable(); //nullable
            $table->string('courierUsed', 50)->nullable(); //nullable
            $table->decimal('shippingFee', 10, 2)->unsigned()->nullable(); //nullable
            $table->string('trackingNumber', 50)->nullable(); //nullable
            // $table->decimal('grandTotal', 10, 2)->unsigned(); //deploy
            $table->decimal('grandTotal', 10, 2)->unsigned()->nullable(); //dev
            $table->dateTime('intransit_at')->nullable();
            $table->boolean('viewedByAdmin')->nullable();
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
