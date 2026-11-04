<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Blog;
use App\Models\Category;

class BlogSeeder extends Seeder
{
    public function run(): void
    {

        $categoryNames = ['Новини', 'Технології', 'Навчання', 'Поради'];
        $categories = [];

        foreach ($categoryNames as $name) {
            $categories[] = Category::updateOrCreate([
                'name' => $name
            ]);
        }


        for ($i = 1; $i <= 8; $i++) {
            Blog::updateOrCreate(
                ['title' => "Навчальний запис №{$i}"],
                [
                    'description' => "Короткий опис запису №{$i}",
                    'text' => "Повний текст запису №{$i}.",

                    'category_id' => $categories[
                    ($i - 1) % count($categories)
                    ]->category_id,
                    'user_id' => null,
                ]
            );
        }
    }
}
