<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Blog;
use App\Models\BlogTranslation;

class BlogTranslationSeeder extends Seeder
{
    public function run(): void
    {
        $blogs = Blog::take(8)->get();

        foreach ($blogs as $index => $blog) {
            $num = $index + 1;

            BlogTranslation::updateOrCreate(
                ['blog_id' => $blog->blog_id, 'locale' => 'uk'],
                [
                    'title' => "Навчальний запис №{$num} (Українська)",
                    'description' => "Короткий опис українською мовою для запису №{$num}.",
                    'text' => "Повний текст статті бібліотечного блогу номер {$num} державною мовою."
                ]
            );

            BlogTranslation::updateOrCreate(
                ['blog_id' => $blog->blog_id, 'locale' => 'en'],
                [
                    'title' => "Educational Post #{$num} (English)",
                    'description' => "Short description in English for post #{$num}.",
                    'text' => "Full text content of the library blog article number {$num} in English."
                ]
            );
        }
    }
}
