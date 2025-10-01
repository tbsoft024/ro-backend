<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('company_types', function (Blueprint $table) {
            $table->id();
            $table->string('code', 100)->unique();
            $table->json('name');
            $table->json('title')->nullable();
            $table->json('description')->nullable();
            $table->json('manager')->nullable();
            $table->json('personnel')->nullable();
            $table->json('customer')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('company_types');
    }
};