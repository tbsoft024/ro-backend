<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('licences', function (Blueprint $table) {
            $table->id();
            $table->uuid('udid')->unique();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('personnel_id')->nullable();
            $table->string('licence_key', 100)->unique();
            $table->tinyInteger('active')->default(1);
            $table->tinyInteger('trial')->default(0);
            $table->double('price')->default(0);
            $table->tinyInteger('paid')->default(0);
            $table->date('start_date');
            $table->date('end_date');
            $table->tinyInteger('module_sms')->default(0);
            $table->tinyInteger('module_appointment')->default(0);
            $table->tinyInteger('module_reminder')->default(0);
            $table->tinyInteger('module_accounting')->default(0);
            $table->tinyInteger('module_export')->default(0);
            $table->string('note', 1000)->nullable();
            $table->timestamps();
            $table->softDeletes();

            // Foreign keyler (opsiyonel)
            // $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            // $table->foreign('personnel_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('licences');
    }
};