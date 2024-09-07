@extends('layouts/head')

@section('main')
<style>
	.game-title p {
	font-family: "Onest";
    font-size: 23px;
    font-weight: 700;
    margin: 20px;
    line-height: 51px;
    text-align: center;
		color:#E68369;
	}
	.quiz-form {
		    margin-top: 30px;
    background: white;
    padding: 30px;
    width: 100vh;
    border-radius: 30px;
	}
	.quiz-btn {
		margin-top:30px;
	border: 1px solid #dfc7b6;
    font-family: "Onest";
    background-color: white;
    color: black;
    border-radius: 5px;
    font-size: 17px;
    padding: 10px 15px;
    z-index: -1;
    transition: 300ms;
    cursor: pointer;
    right: 0;
    bottom: 0px;
}
	.quiz-btn:hover {
		color:green;
	}
	}
</style>
	<div class="main">
		
	<form class="quiz-form" action="{{ route('quiz.submit') }}" method="POST">
        @csrf
		<div class="game-title">
			<p>Викторина</p>
		</div>
		
        @foreach ($questions as $question)
            <fieldset>
                <legend style="font-weight:600; font-size:20px; color: #000;">{{ $question->question_text }}</legend>
                @foreach ($question->answers as $answer)
                    <label>
                        <input type="radio" name="answers[{{ $question->id }}]" value="{{ $answer->id }}">
                        {{ $answer->answer_text }}
                    </label><br>
                @endforeach
            </fieldset>
        @endforeach
        <button class="quiz-btn" type="submit">Отправить</button>
    </form>
</div>
@endsection