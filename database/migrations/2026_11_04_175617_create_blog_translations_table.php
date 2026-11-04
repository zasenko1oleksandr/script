<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('blog_translations', function (Blueprint $table) {
            $table->id('translation_id');
            // Зовнішній ключ на нашу таблицю blogs з кастомним ключем blog_id
            $table->unsignedBigInteger('blog_id');
            $table->foreign('blog_id')->references('blog_id')->on('blogs')->onDelete('cascade');

            $table->string('locale', 10); // Наприклад, 'uk', 'en'
            $table->string('title');
            $table->text('description')->nullable();
            $table->longText('text')->nullable();

            $table->timestamps();

            // Унікальний індекс, щоб для одного блогу не було дублів однієї мови
            $table->unique(['blog_id', 'locale']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('blog_translations');
    }
};
