<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('verification_tokens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('token', 1000);
            $table->boolean('used')->default(0);
            $table->enum('type', ['sms', 'email', 'notification'])->nullable();
            $table->timestamps();
            $table->softDeletes();

            // Foreign key (opsiyonel)
            // $table->foreign('user_id')->references('id')->on('users');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('verification_tokens');
    }
};