<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Предопределенные теги
        $tags = [
            'Депрессия',
            'Тревога',
            'Одиночество',
            'Стресс',
            'Самоубийство',
            'Психическое здоровье',
            'Поддержка',
            'Исцеление',
            'Психотерапия',
            'Антидепрессанты',
            'Травмы',
            'Страх',
            'Потеря дорогого человека',
            'Страх перед смертью',
            'Фобия',

        ];

        // Создаем каждый тег и сохраняем его в базе данных
        foreach ($tags as $tagName) {
            Tag::create([
                'name' => $tagName,
            ]);
        }
    }
}
