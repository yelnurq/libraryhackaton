<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\Question;
use App\Models\Answer;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index()
    {
        $topics = Topic::all();
        return view('quiz.select_topic', compact('topics'));
    }

    public function show($id)
    {
        $questions = Question::where('topic_id', $id)->with('answers')->get();
        return view('quiz.index', compact('questions'));
    }

    public function submit(Request $request)
    {
        $score = 0;

        foreach ($request->input('answers', []) as $questionId => $answerId) {
            $answer = Answer::find($answerId);
            if ($answer && $answer->is_correct) {
                $score++;
            }
        }

        return view('quiz.result', ['score' => $score]);
    }
}
