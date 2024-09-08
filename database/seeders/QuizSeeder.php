<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Topic;

class QuizSeeder extends Seeder
{
    public function run()
    {
        $topics = Topic::all();

        $topic = $topics->where('name', 'Гарри Поттер и философский камень')->first();
        $questions = [
            ['question_text' => 'Какое имя носит волшебное учреждение, в которое Гарри Поттер поступает на обучение?'],
            ['question_text' => 'Как называется драгоценный камень, который Гарри и его друзья ищут в первой книге?'],
            ['question_text' => 'Кто из персонажей является директором Хогвартса в первой книге?'],
            ['question_text' => 'Какое заклинание использует Гарри для ослепления тьмы?'],
            ['question_text' => 'Как зовут лучшего друга Гарри Поттера, который также является его одноклассником?'],
            ['question_text' => 'Какое животное является символом факультета Гриффиндор?'],
        ];

        $answers = [
            ['answer_text' => 'Хогвартс', 'is_correct' => true],
            ['answer_text' => 'Грингоц', 'is_correct' => false],
            ['answer_text' => 'Диагон-Аллея', 'is_correct' => false],
            ['answer_text' => 'Дурслей', 'is_correct' => false],

            // Вопрос 2
            ['answer_text' => 'Философский камень', 'is_correct' => true],
            ['answer_text' => 'Кристалл', 'is_correct' => false],
            ['answer_text' => 'Сапфир', 'is_correct' => false],
            ['answer_text' => 'Амулет', 'is_correct' => false],

            // Вопрос 3
            ['answer_text' => 'Альбус Дамблдор', 'is_correct' => true],
            ['answer_text' => 'Северус Снегг', 'is_correct' => false],
            ['answer_text' => 'Ремус Люпин', 'is_correct' => false],
            ['answer_text' => 'Минерва Макгонегал', 'is_correct' => false],

            // Вопрос 4
            ['answer_text' => 'Люмус', 'is_correct' => false],
            ['answer_text' => 'Экспекто Патронум', 'is_correct' => false],
            ['answer_text' => 'Алохомора', 'is_correct' => false],
            ['answer_text' => 'Редукто', 'is_correct' => false],

            // Вопрос 5
            ['answer_text' => 'Рон Уизли', 'is_correct' => true],
            ['answer_text' => 'Гермиона Грейнджер', 'is_correct' => false],
            ['answer_text' => 'Драко Малфой', 'is_correct' => false],
            ['answer_text' => 'Невилл Долгопупс', 'is_correct' => false],

            // Вопрос 6
            ['answer_text' => 'Лев', 'is_correct' => true],
            ['answer_text' => 'Орел', 'is_correct' => false],
            ['answer_text' => 'Змея', 'is_correct' => false],
            ['answer_text' => 'Гризли', 'is_correct' => false],
        ];

        foreach ($questions as $index => $questionData) {
            $question = Question::create([
                'topic_id' => $topic->id,
                'question_text' => $questionData['question_text'],
            ]);

            foreach (array_slice($answers, $index * 4, 4) as $answerData) {
                Answer::create([
                    'question_id' => $question->id,
                    'answer_text' => $answerData['answer_text'],
                    'is_correct' => $answerData['is_correct'],
                ]);
            }
        }

        $topic = $topics->where('name', 'Властелин колец: Братство кольца')->first();
        $questions = [
            ['question_text' => 'Как зовут главного героя, который должен уничтожить кольцо?'],
            ['question_text' => 'Какой магический предмет дарует Гэндальф?'],
            ['question_text' => 'Какой город является столицей Гондора?'],
            ['question_text' => 'Какая раса не существовала в Средиземье до создания колец власти?'],
            ['question_text' => 'Какая сущность была создана, чтобы найти кольцо и вернуть его к Саурону?'],
            ['question_text' => 'Как зовут короля Рохана, который страдает от злого влияния?'],
        ];

        $answers = [
            // Вопрос 1
            ['answer_text' => 'Фродо Бэггинс', 'is_correct' => true],
            ['answer_text' => 'Гэндальф', 'is_correct' => false],
            ['answer_text' => 'Арагорн', 'is_correct' => false],
            ['answer_text' => 'Леголас', 'is_correct' => false],

            // Вопрос 2
            ['answer_text' => 'Посох', 'is_correct' => true],
            ['answer_text' => 'Кольцо', 'is_correct' => false],
            ['answer_text' => 'Меч', 'is_correct' => false],
            ['answer_text' => 'Щит', 'is_correct' => false],

            // Вопрос 3
            ['answer_text' => 'Минас Тирит', 'is_correct' => true],
            ['answer_text' => 'Лориэн', 'is_correct' => false],
            ['answer_text' => 'Рохан', 'is_correct' => false],
            ['answer_text' => 'Бри', 'is_correct' => false],

            // Вопрос 4
            ['answer_text' => 'Хоббиты', 'is_correct' => false],
            ['answer_text' => 'Эльфы', 'is_correct' => false],
            ['answer_text' => 'Орки', 'is_correct' => false],
            ['answer_text' => 'Гномы', 'is_correct' => true],

            // Вопрос 5
            ['answer_text' => 'Назгул', 'is_correct' => true],
            ['answer_text' => 'Оракул', 'is_correct' => false],
            ['answer_text' => 'Рыцари', 'is_correct' => false],
            ['answer_text' => 'Гоблины', 'is_correct' => false],

            // Вопрос 6
            ['answer_text' => 'Теоден', 'is_correct' => true],
            ['answer_text' => 'Гимли', 'is_correct' => false],
            ['answer_text' => 'Эомер', 'is_correct' => false],
            ['answer_text' => 'Фарамир', 'is_correct' => false],
        ];

        foreach ($questions as $index => $questionData) {
            $question = Question::create([
                'topic_id' => $topic->id,
                'question_text' => $questionData['question_text'],
            ]);

            foreach (array_slice($answers, $index * 4, 4) as $answerData) {
                Answer::create([
                    'question_id' => $question->id,
                    'answer_text' => $answerData['answer_text'],
                    'is_correct' => $answerData['is_correct'],
                ]);
            }
        }

        $topic = $topics->where('name', '1984')->first();
        $questions = [
            ['question_text' => 'Какой орган правительства контролирует информацию и правду в Океании?'],
            ['question_text' => 'Как называется система наблюдения за гражданами в Океании?'],
            ['question_text' => 'Какой лозунг о власти написан на стене министерства правды?'],
            ['question_text' => 'Кто является главным врагом государства в "1984"?'],
            ['question_text' => 'Какой период времени главного героя описан в книге?'],
            ['question_text' => 'Какой метод используется для переписывания истории?'],
        ];

        $answers = [
            // Вопрос 1
            ['answer_text' => 'Министерство правды', 'is_correct' => true],
            ['answer_text' => 'Министерство мира', 'is_correct' => false],
            ['answer_text' => 'Министерство любви', 'is_correct' => false],
            ['answer_text' => 'Министерство изобилия', 'is_correct' => false],

            // Вопрос 2
            ['answer_text' => 'Большой брат', 'is_correct' => false],
            ['answer_text' => 'Глаз', 'is_correct' => false],
            ['answer_text' => 'Телевизор', 'is_correct' => false],
            ['answer_text' => 'Телевизионное наблюдение', 'is_correct' => true],

            // Вопрос 3
            ['answer_text' => 'Свобода — это рабство', 'is_correct' => false],
            ['answer_text' => 'Война — это мир', 'is_correct' => false],
            ['answer_text' => 'Незнание — это сила', 'is_correct' => false],
            ['answer_text' => 'Война — это мир, свобода — это рабство, незнание — это сила', 'is_correct' => true],

            // Вопрос 4
            ['answer_text' => 'Враг народа', 'is_correct' => false],
            ['answer_text' => 'Биг Бен', 'is_correct' => false],
            ['answer_text' => 'Римская империя', 'is_correct' => false],
            ['answer_text' => 'Евгений Смирнов', 'is_correct' => false],

            // Вопрос 5
            ['answer_text' => 'Период Великой войны', 'is_correct' => false],
            ['answer_text' => 'Период Свободы', 'is_correct' => false],
            ['answer_text' => 'Современность', 'is_correct' => false],
            ['answer_text' => 'Период диктатуры', 'is_correct' => true],

            // Вопрос 6
            ['answer_text' => 'Фальсификация', 'is_correct' => true],
            ['answer_text' => 'Реализация', 'is_correct' => false],
            ['answer_text' => 'Изменение', 'is_correct' => false],
            ['answer_text' => 'Искажение', 'is_correct' => false],
        ];

        foreach ($questions as $index => $questionData) {
            $question = Question::create([
                'topic_id' => $topic->id,
                'question_text' => $questionData['question_text'],
            ]);

            foreach (array_slice($answers, $index * 4, 4) as $answerData) {
                Answer::create([
                    'question_id' => $question->id,
                    'answer_text' => $answerData['answer_text'],
                    'is_correct' => $answerData['is_correct'],
                ]);
            }
        }

        $topic = $topics->where('name', 'Убить пересмешника')->first();
        $questions = [
            ['question_text' => 'Как зовут главного героя книги "Убить пересмешника"?'],
            ['question_text' => 'Какой город является местом действия романа?'],
            ['question_text' => 'Как называется адвокат, который защищает Тома Робинсона?'],
            ['question_text' => 'Какая расовая проблема описана в книге?'],
            ['question_text' => 'Какой член семьи Финчи представляет главного героя?'],
            ['question_text' => 'Какой важный моральный урок преподает книга?'],
        ];

        $answers = [
            // Вопрос 1
            ['answer_text' => 'Скаут Финчи', 'is_correct' => true],
            ['answer_text' => 'Джем Финчи', 'is_correct' => false],
            ['answer_text' => 'Том Робинсон', 'is_correct' => false],
            ['answer_text' => 'Аттикус Финчи', 'is_correct' => false],

            // Вопрос 2
            ['answer_text' => 'Мэйкомб', 'is_correct' => true],
            ['answer_text' => 'Атланта', 'is_correct' => false],
            ['answer_text' => 'Нью-Йорк', 'is_correct' => false],
            ['answer_text' => 'Бостон', 'is_correct' => false],

            // Вопрос 3
            ['answer_text' => 'Аттикус Финчи', 'is_correct' => true],
            ['answer_text' => 'Джим Финчи', 'is_correct' => false],
            ['answer_text' => 'Скаут Финчи', 'is_correct' => false],
            ['answer_text' => 'Том Робинсон', 'is_correct' => false],

            // Вопрос 4
            ['answer_text' => 'Дискриминация по расовому признаку', 'is_correct' => true],
            ['answer_text' => 'Экономическая несправедливость', 'is_correct' => false],
            ['answer_text' => 'Проблемы с алкоголизмом', 'is_correct' => false],
            ['answer_text' => 'Политическая коррупция', 'is_correct' => false],

            // Вопрос 5
            ['answer_text' => 'Отец', 'is_correct' => true],
            ['answer_text' => 'Мать', 'is_correct' => false],
            ['answer_text' => 'Брат', 'is_correct' => false],
            ['answer_text' => 'Сестра', 'is_correct' => false],

            // Вопрос 6
            ['answer_text' => 'Важно ставить себя на место других людей', 'is_correct' => true],
            ['answer_text' => 'Необходимо стремиться к богатству', 'is_correct' => false],
            ['answer_text' => 'Каждый человек должен быть независимым', 'is_correct' => false],
            ['answer_text' => 'Нужно избегать конфликтов', 'is_correct' => false],
        ];

        foreach ($questions as $index => $questionData) {
            $question = Question::create([
                'topic_id' => $topic->id,
                'question_text' => $questionData['question_text'],
            ]);

            foreach (array_slice($answers, $index * 4, 4) as $answerData) {
                Answer::create([
                    'question_id' => $question->id,
                    'answer_text' => $answerData['answer_text'],
                    'is_correct' => $answerData['is_correct'],
                ]);
            }
        }

        $topic = $topics->where('name', 'Маленький принц')->first();
        $questions = [
            ['question_text' => 'Какой планеты является Маленький принц?'],
            ['question_text' => 'Какой цветок является символом Маленького принца?'],
            ['question_text' => 'Как называется планета, на которой живет Маленький принц?'],
            ['question_text' => 'Какой животное встречает Маленький принц на Земле?'],
            ['question_text' => 'Какой персонаж является другом Маленького принца и помогает ему вернуться домой?'],
            ['question_text' => 'Какой урок Маленький принц учит о любви и дружбе?'],
        ];

        $answers = [
            // Вопрос 1
            ['answer_text' => 'Астероид B-612', 'is_correct' => true],
            ['answer_text' => 'Планета Земля', 'is_correct' => false],
            ['answer_text' => 'Планета Венера', 'is_correct' => false],
            ['answer_text' => 'Планета Марс', 'is_correct' => false],

            // Вопрос 2
            ['answer_text' => 'Роза', 'is_correct' => true],
            ['answer_text' => 'Лотос', 'is_correct' => false],
            ['answer_text' => 'Лилия', 'is_correct' => false],
            ['answer_text' => 'Тюльпан', 'is_correct' => false],

            // Вопрос 3
            ['answer_text' => 'Астероид B-612', 'is_correct' => true],
            ['answer_text' => 'Планета Земля', 'is_correct' => false],
            ['answer_text' => 'Планета Луна', 'is_correct' => false],
            ['answer_text' => 'Планета Юпитер', 'is_correct' => false],

            // Вопрос 4
            ['answer_text' => 'Лиса', 'is_correct' => true],
            ['answer_text' => 'Слон', 'is_correct' => false],
            ['answer_text' => 'Лошадь', 'is_correct' => false],
            ['answer_text' => 'Медведь', 'is_correct' => false],

            // Вопрос 5
            ['answer_text' => 'Лиса', 'is_correct' => true],
            ['answer_text' => 'Слон', 'is_correct' => false],
            ['answer_text' => 'Медведь', 'is_correct' => false],
            ['answer_text' => 'Кот', 'is_correct' => false],

            // Вопрос 6
            ['answer_text' => 'Любовь требует ответственности и заботы', 'is_correct' => true],
            ['answer_text' => 'Дружба не требует усилий', 'is_correct' => false],
            ['answer_text' => 'Люди должны быть независимыми', 'is_correct' => false],
            ['answer_text' => 'Истинная дружба — это постоянная борьба', 'is_correct' => false],
        ];

        foreach ($questions as $index => $questionData) {
            $question = Question::create([
                'topic_id' => $topic->id,
                'question_text' => $questionData['question_text'],
            ]);

            foreach (array_slice($answers, $index * 4, 4) as $answerData) {
                Answer::create([
                    'question_id' => $question->id,
                    'answer_text' => $answerData['answer_text'],
                    'is_correct' => $answerData['is_correct'],
                ]);
            }
        }

        $topic = $topics->where('name', 'Сильмариллион')->first();
        $questions = [
            ['question_text' => 'Какое существо создал Илуватар в начале времени?'],
            ['question_text' => 'Какой расы были Валар?'],
            ['question_text' => 'Какой из Сильмариллов был украден Морготом?'],
            ['question_text' => 'Кто был первым королем Гондора?'],
            ['question_text' => 'Как называется волшебный камень, который мог исполнять желания?'],
            ['question_text' => 'Какой знаменитый герой сражался с Драконом Смогом?'],
        ];

        $answers = [
            // Вопрос 1
            ['answer_text' => 'Эру', 'is_correct' => true],
            ['answer_text' => 'Мелькор', 'is_correct' => false],
            ['answer_text' => 'Аулë', 'is_correct' => false],
            ['answer_text' => 'Тулкас', 'is_correct' => false],

            // Вопрос 2
            ['answer_text' => 'Айнур', 'is_correct' => true],
            ['answer_text' => 'Эльфы', 'is_correct' => false],
            ['answer_text' => 'Люди', 'is_correct' => false],
            ['answer_text' => 'Гномы', 'is_correct' => false],

            // Вопрос 3
            ['answer_text' => 'Сильмарилл', 'is_correct' => true],
            ['answer_text' => 'Ангаманд', 'is_correct' => false],
            ['answer_text' => 'Дракон', 'is_correct' => false],
            ['answer_text' => 'Артефакт', 'is_correct' => false],

            // Вопрос 4
            ['answer_text' => 'Элендиль', 'is_correct' => true],
            ['answer_text' => 'Арвен', 'is_correct' => false],
            ['answer_text' => 'Боромир', 'is_correct' => false],
            ['answer_text' => 'Фарамир', 'is_correct' => false],

            // Вопрос 5
            ['answer_text' => 'Аркенстон', 'is_correct' => false],
            ['answer_text' => 'Рассветный камень', 'is_correct' => false],
            ['answer_text' => 'Эльфийское кольцо', 'is_correct' => false],
            ['answer_text' => 'Сильмарилл', 'is_correct' => true],

            // Вопрос 6
            ['answer_text' => 'Бильбо Бэггинс', 'is_correct' => true],
            ['answer_text' => 'Фродо Бэггинс', 'is_correct' => false],
            ['answer_text' => 'Арагорн', 'is_correct' => false],
            ['answer_text' => 'Гэндальф', 'is_correct' => false],
        ];

        foreach ($questions as $index => $questionData) {
            $question = Question::create([
                'topic_id' => $topic->id,
                'question_text' => $questionData['question_text'],
            ]);

            foreach (array_slice($answers, $index * 4, 4) as $answerData) {
                Answer::create([
                    'question_id' => $question->id,
                    'answer_text' => $answerData['answer_text'],
                    'is_correct' => $answerData['is_correct'],
                ]);
            }
        }
    }
}
