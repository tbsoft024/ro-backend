<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payment_plans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('created_user_id')->nullable();
            $table->unsignedBigInteger('last_updated_user_id')->nullable();
            $table->unsignedBigInteger('service_id');
            $table->integer('instalment')->nullable();
            $table->double('price')->nullable();
            $table->double('paid_price')->nullable();
            $table->string('description', 2500)->nullable();
            $table->date('payment_date')->nullable();
            $table->timestamps();
            $table->softDeletes();

            // Foreign keyler (opsiyonel)
            // $table->foreign('customer_id')->references('id')->on('users');
            // $table->foreign('service_id')->references('id')->on('services');
            // $table->foreign('created_user_id')->references('id')->on('users');
            // $table->foreign('last_updated_user_id')->references('id')->on('users');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payment_plans');
    }
};