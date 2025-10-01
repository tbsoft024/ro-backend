<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('message_templates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('created_user_id')->nullable();
            $table->unsignedBigInteger('last_updated_user_id')->nullable();
            $table->string('code', 100);
            $table->string('title', 500)->nullable();
            $table->string('content', 2500)->nullable();
            $table->timestamps();
            $table->softDeletes();

            // $table->foreign('created_user_id')->references('id')->on('users');
            // $table->foreign('last_updated_user_id')->references('id')->on('users');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('message_templates');
    }
};