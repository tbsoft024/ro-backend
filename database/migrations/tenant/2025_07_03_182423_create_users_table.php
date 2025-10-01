<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('udid', 50)->unique();
            $table->string('name', 50);
            $table->string('username', 20)->unique();
            $table->string('email', 250)->unique();
            $table->string('phone_number', 25)->nullable();
            $table->text('password');
            $table->text('web_token')->nullable();
            $table->string('remember_token', 100)->nullable();
            $table->string('note', 1000)->nullable();
            $table->unsignedBigInteger('language_id')->nullable();
            $table->unsignedBigInteger('image_id')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->unsignedBigInteger('district_id')->nullable();
            $table->enum('level', ['customer', 'personnel', 'admin'])->default('customer');
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('phone_verified_at')->nullable();
            $table->timestamp('last_login_time')->nullable();
            $table->timestamps();
            $table->softDeletes();

            // Foreign keyler (isteğe bağlı)
            // $table->foreign('language_id')->references('id')->on('supported_languages')->onDelete('set null');
            // $table->foreign('image_id')->references('id')->on('images')->onDelete('set null');
            // $table->foreign('country_id')->references('id')->on('countries')->onDelete('set null');
            // $table->foreign('city_id')->references('id')->on('cities')->onDelete('set null');
            // $table->foreign('district_id')->references('id')->on('districts')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};