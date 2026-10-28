<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id(); // Первинний ключ
            $table->string('title');       // 1. Назва книги
            $table->string('author');      // 2. Автор
            $table->integer('year');       // 3. Рік видання
            $table->integer('pages');      // 4. Кількість сторінок
            $table->string('genre');       // 5. Жанр / Категорія
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
