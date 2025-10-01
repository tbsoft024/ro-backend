<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_module_permissions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('last_updated_user_id')->nullable();
            $table->string('module_code', 250);
            $table->boolean('read')->default(0);
            $table->boolean('write')->default(0);
            $table->boolean('delete')->default(0);
            $table->timestamps();
            $table->softDeletes();

            // Foreign keyler (opsiyonel)
            // $table->foreign('user_id')->references('id')->on('users');
            // $table->foreign('last_updated_user_id')->references('id')->on('users');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_module_permissions');
    }
};