@extends('layouts/head')

@section('main')
<style>
	.select-topic {
		    margin-top: 30px;
    background: white;
    padding: 30px;
    width: 100vh;
    border-radius: 30px;
	}
	.select-topic-title {
		    font-family: "Onest";
    font-size: 23px;
    font-weight: 700;
    margin: 20px;
    line-height: 51px;
    text-align: left;
    color: #E68369;
	}
	.select-topic-text {
				    font-family: "Onest";
    font-size: 16px;
    font-weight: 500;
	margin-bottom:10px;
    text-align: left;
    color: black;
	}
</style>
<div class="main">
		<div class="select-topic">
			    <p class="select-topic-title">Выберите тему викторины</p>
				<ol>
					@foreach ($topics as $topic)
						<li style="margin-bottom:15px;"><a class="select-topic-text" href="{{ route('quiz.show', $topic->id) }}">{{ $topic->name }}</a></li>
					@endforeach
				</ol>
		</div>
</div>
@endsection