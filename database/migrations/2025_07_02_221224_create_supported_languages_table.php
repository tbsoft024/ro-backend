<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('supported_languages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('flag_image_id')->nullable();
            $table->string('name', 100);
            $table->string('eng_name', 100)->nullable();
            $table->string('short_name', 25)->nullable();
            $table->string('lang_code', 25)->nullable();
            $table->string('country_code', 25)->nullable();
            $table->timestamps();
            $table->softDeletes();

            // Foreign key (opsiyonel)
            // $table->foreign('flag_image_id')->references('id')->on('images')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('supported_languages');
    }
};