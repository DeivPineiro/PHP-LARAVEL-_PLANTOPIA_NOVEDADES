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
        Schema::create('news_have_tags', function (Blueprint $table) {
            $table->foreignId('noticia_id')->constrained('noticias','noticia_id');
            $table->unsignedTinyInteger('tag_id');
            $table->foreign('tag_id')->references('tag_id')->on('tags');
            $table->primary(['noticia_id', 'tag_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news_have_tags');
    }
};
