<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->uuid('udid')->unique();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->json('name');
            $table->string('email', 250);
            $table->string('phone_number', 25)->nullable();
            $table->string('password')->nullable();
            $table->string('official_name', 250)->nullable();
            $table->string('tax_number', 50)->nullable();
            $table->string('tax_office', 250)->nullable();
            $table->string('address', 5000)->nullable();
            $table->string('note', 1000)->nullable();
            $table->string('subdomain', 50)->unique();
            $table->string('db_name', 100)->unique();
            $table->unsignedBigInteger('company_type_id')->nullable();
            $table->unsignedBigInteger('language_id')->nullable();
            $table->unsignedBigInteger('image_id')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->unsignedBigInteger('district_id')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('phone_verified_at')->nullable();
            $table->timestamp('last_login_time')->nullable();
            $table->timestamps();
            $table->softDeletes();

            // Foreign key'ler (opsiyonel, ileride eklenebilir)
            // $table->foreign('user_id')->references('id')->on('users')->nullOnDelete();
            // $table->foreign('company_type_id')->references('id')->on('company_types')->nullOnDelete();
            // $table->foreign('language_id')->references('id')->on('supported_languages')->nullOnDelete();
            // $table->foreign('image_id')->references('id')->on('images')->nullOnDelete();
            // $table->foreign('country_id')->references('id')->on('countries')->nullOnDelete();
            // $table->foreign('city_id')->references('id')->on('cities')->nullOnDelete();
            // $table->foreign('district_id')->references('id')->on('districts')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};