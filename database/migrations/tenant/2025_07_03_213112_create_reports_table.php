<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('document_id');
            $table->unsignedBigInteger('created_user_id')->nullable();
            $table->unsignedBigInteger('last_updated_user_id')->nullable();
            $table->string('title', 500)->nullable();
            $table->string('description', 2500)->nullable();
            $table->timestamps();
            $table->softDeletes();

            // Foreign keyler (opsiyonel)
            // $table->foreign('document_id')->references('id')->on('documents');
            // $table->foreign('created_user_id')->references('id')->on('users');
            // $table->foreign('last_updated_user_id')->references('id')->on('users');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};