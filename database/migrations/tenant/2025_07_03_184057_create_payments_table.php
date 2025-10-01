<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('created_user_id')->nullable();
            $table->unsignedBigInteger('last_updated_user_id')->nullable();
            $table->unsignedBigInteger('service_id')->nullable();
            $table->unsignedBigInteger('payment_plan_id')->nullable();
            $table->double('price')->default(0);
            $table->double('paid_price')->default(0);
            $table->enum('type', ['online', 'credit card', 'cash', 'transfer', 'other'])->nullable();
            $table->string('description', 2500)->nullable();
            $table->timestamps();
            $table->softDeletes();

            // Foreign keyler (opsiyonel)
            // $table->foreign('customer_id')->references('id')->on('users');
            // $table->foreign('created_user_id')->references('id')->on('users');
            // $table->foreign('last_updated_user_id')->references('id')->on('users');
            // $table->foreign('service_id')->references('id')->on('services');
            // $table->foreign('payment_plan_id')->references('id')->on('payment_plans');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};