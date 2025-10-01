<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('sender_user_id')->nullable();
            $table->unsignedBigInteger('language_id')->nullable();
            $table->string('topic', 250)->nullable();
            $table->string('title', 500)->nullable();
            $table->text('content')->nullable();
            $table->date('date')->nullable();
            $table->enum('type', ['sms', 'email', 'notification']);
            $table->boolean('success')->default(false);
            $table->timestamp('read_at')->nullable();
            $table->timestamps();
            $table->softDeletes();

            // Foreign keyler (opsiyonel)
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            // $table->foreign('sender_user_id')->references('id')->on('users')->onDelete('set null');
            // $table->foreign('language_id')->references('id')->on('supported_languages')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};