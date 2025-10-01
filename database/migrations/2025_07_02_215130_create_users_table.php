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
            $table->uuid('udid')->unique();
            $table->string('name', 50);
            $table->string('username', 20)->unique();
            $table->string('email', 250)->unique();
            $table->string('phone_number', 25)->nullable();
            $table->string('password');
            $table->text('web_token')->nullable(); // <-- JWT için alan
            $table->text('note')->nullable();
            $table->unsignedBigInteger('language_id')->nullable();
            $table->unsignedBigInteger('image_id')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->enum('level', ['customer', 'personnel', 'admin'])->default('customer');
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('phone_verified_at')->nullable();
            $table->timestamp('last_login_time')->nullable();
            $table->timestamps();
            $table->softDeletes();

            // Foreign keyler (opsiyonel)
            // $table->foreign('language_id')->references('id')->on('supported_languages')->nullOnDelete();
            // $table->foreign('image_id')->references('id')->on('images')->nullOnDelete();
            // $table->foreign('country_id')->references('id')->on('countries')->nullOnDelete();
            // $table->foreign('city_id')->references('id')->on('cities')->nullOnDelete();
            // $table->foreign('company_id')->references('id')->on('companies')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};