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
        Schema::create('lecciones', function (Blueprint $table) {
            $table->id('lec_id');
            $table->foreignId('cur_id')->references('cur_id')->on('cursos');
            $table->string('lec_titulo');
            $table->string('lec_descripcion');
            $table->string('lec_video');
            $table->integer('lec_duracion');
            $table->integer('lec_estado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lecciones');
    }
};
