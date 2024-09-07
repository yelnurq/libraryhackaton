<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Topic;

class TopicSeeder extends Seeder
{
    public function run()
    {
        Topic::create(['name' => 'Гарри Поттер и философский камень']);
        Topic::create(['name' => 'Властелин колец: Братство кольца']);
        Topic::create(['name' => '1984']);
        Topic::create(['name' => 'Убить пересмешника']);
        Topic::create(['name' => 'Маленький принц']);
        Topic::create(['name' => 'Сильмариллион']);
    }
}
