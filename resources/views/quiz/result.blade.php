@extends('layouts/head')

@section('main')
<style>
	.result-quiz {
	   margin-top: 30px;
    background: white;
    padding: 30px;
    width: 100vh;
    border-radius: 30px;
	}
	.result-quiz-p {
		    font-size: 23px;
    font-weight: 600;
    text-align: center;

    margin: 0;
	}
	.result-qu {
	    margin-top: 10px;
    font-weight: 600;
    font-size: 20px;
    
	}
	
</style>
    <div class="main">
		<div class="result-quiz">
					<p class="result-quiz-p">Ваш результат</p>
			<p class="result-qu">Вы набрали <span style="color: #E68369;">{{ $score }}</span> баллов.</p>
    <a style="color: #909090;text-decoration: none;" href="{{ route('quiz.index') }}">Пройти викторину снова</a>
		</div>
</div>
@endsection
