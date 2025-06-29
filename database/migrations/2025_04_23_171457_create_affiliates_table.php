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
        Schema::create('affiliates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('password');
            $table->string('photo')->nullable();
            $table->string('phone')->nullable()->unique();
            $table->text('address')->nullable();
            $table->json('bank_details')->nullable();
            $table->smallInteger('commision_rate')->default(10);
            $table->smallInteger('discount_rate')->default(5);
            $table->string('referral_code')->nullable()->unique();
            $table->boolean('status')->default(1);
            $table->integer('otp')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('affiliates');
    }
};
