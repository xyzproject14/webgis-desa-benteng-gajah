<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('potensi_models', function (Blueprint $table) {
            $table->id();
            $table->string('potensi');
            $table->integer('luas_lahan');
            $table->string('pemilik');
            $table->string('dusun');
            $table->string('fileJSON_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('potensi_models');
    }
};
