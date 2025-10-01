<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reminders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('created_user_id')->nullable();
            $table->unsignedBigInteger('last_updated_user_id')->nullable();
            $table->string('title', 500)->nullable();
            $table->string('description', 2500)->nullable();
            $table->dateTime('start_at')->nullable();
            $table->dateTime('end_at')->nullable();
            $table->enum('type', ['sms', 'notification'])->nullable();
            $table->timestamps();
            $table->softDeletes();

            // Foreign keyler (opsiyonel)
            // $table->foreign('customer_id')->references('id')->on('users');
            // $table->foreign('created_user_id')->references('id')->on('users');
            // $table->foreign('last_updated_user_id')->references('id')->on('users');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reminders');
    }
};