<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id('blog_id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->text('text')->nullable();
            $table->foreignId('category_id')->nullable()->constrained('categories', 'category_id')->nullOnDelete();
            $table->unsignedBigInteger('user_id')->nullable();

            // Виправлено: кастомні колонки дат, які очікує модель
            $table->timestamp('dt_created')->nullable();
            $table->timestamp('dt_updated')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
