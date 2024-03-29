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
        Schema::create('data_sets', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->float('tb');
            $table->float('db');
            $table->float('alkaline');
            $table->float('alamine');
            $table->float('aspirate');
            $table->float('tp');
            $table->float('alb');
            $table->float('ag');
            $table->integer('hasil');
            $table->float('prediksi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_sets');
    }
};
