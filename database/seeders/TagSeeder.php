<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = ['Депрессия', 'Психология']; // Замените на ваши теги
        foreach ($tags as $tagName) {
            Tag::create(['name' => $tagName]);
        }
    }
}
