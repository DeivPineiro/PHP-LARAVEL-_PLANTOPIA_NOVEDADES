<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Crear tabla por artisan     
    //php artisan make:migration create_noticias_table ---> Creamos Tablas
    //php artisan migrate:fresh  ----------> actualiza DB
    public function up(): void
    {
        Schema::create('noticias', function (Blueprint $table) {
            $table->id('noticia_id');
            $table->string('titulo', 100);
            $table->string('subtitulo', 100);
            $table->string('parrafo', 5000);
            $table->string('img', 100)->nullable();
            $table->date('fecha_creacion');
            $table->string('editor');
            $table->boolean('publicado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('noticias');
    }
};
