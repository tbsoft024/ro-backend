<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('company_info', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('created_user_id')->nullable();
            $table->unsignedBigInteger('last_updated_user_id')->nullable();
            $table->unsignedBigInteger('image_id')->nullable();
            $table->string('name', 500);
            $table->timestamps();
            $table->softDeletes();

            // Foreign keyler (opsiyonel)
            // $table->foreign('created_user_id')->references('id')->on('users')->onDelete('set null');
            // $table->foreign('last_updated_user_id')->references('id')->on('users')->onDelete('set null');
            // $table->foreign('image_id')->references('id')->on('images')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('company_info');
    }
};