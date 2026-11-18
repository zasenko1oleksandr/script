<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('author_book', function (Blueprint $table) {
            $table->id('author_book_id');

            $table->unsignedBigInteger('book_id');
            $table->unsignedBigInteger('author_id');

            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
            $table->foreign('author_id')->references('author_id')->on('authors')->onDelete('cascade');

            $table->unique(['book_id', 'author_id']);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('author_book');
    }
};
