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
        Schema::table('noticias', function (Blueprint $table) {
            $table->unsignedTinyInteger('topico_id');
            $table->foreign('topico_id')->references('topico_id')->on('topicos'); // asigno la Clave foranea          
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('noticias', function (Blueprint $table) {
            $table->dropColumn('topico_id');
        });
    }
};
