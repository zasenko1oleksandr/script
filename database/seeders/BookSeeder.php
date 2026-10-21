<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('books')->insert([
            [
                'title' => 'Кобзар',
                'author' => 'Тарас Шевченко',
                'year' => 1840,
                'pages' => 250,
                'genre' => 'Поезія',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Тіні забутих предків',
                'author' => 'Михайло Коцюбинський',
                'year' => 1911,
                'pages' => 160,
                'genre' => 'Повість',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Тигролови',
                'author' => 'Іван Багряний',
                'year' => 1944,
                'pages' => 240,
                'genre' => 'Пригодницький роман',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Захар Беркут',
                'author' => 'Іван Франко',
                'year' => 1883,
                'pages' => 190,
                'genre' => 'Історична повість',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Місто',
                'author' => 'Валер\'ян Підмогильний',
                'year' => 1928,
                'pages' => 280,
                'genre' => 'Модерний роман',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
