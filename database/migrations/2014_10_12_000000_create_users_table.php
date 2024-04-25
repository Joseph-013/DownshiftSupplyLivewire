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
            $table->enum('status', ['active', 'deleted'])->default('active');
            $table->string('username', 100)->unique(); //unique?
            $table->string('fullname');
            $table->string('email')->unique(); //unique?
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 100);
            $table->enum('usertype', ['admin', 'user'])->default('user');
            $table->rememberToken();
            $table->timestamps();
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
