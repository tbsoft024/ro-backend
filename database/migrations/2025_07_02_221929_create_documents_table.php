<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->unsignedBigInteger('image_id')->nullable();
            $table->string('name', 250);
            $table->string('url', 1000);
            $table->string('path', 1000)->nullable();
            $table->string('mime', 250)->nullable();
            $table->timestamps();
            $table->softDeletes();

            // Foreign keyler (opsiyonel)
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            // $table->foreign('company_id')->references('id')->on('companies')->onDelete('set null');
            // $table->foreign('image_id')->references('id')->on('images')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};