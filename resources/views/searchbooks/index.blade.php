@extends('..layouts/head')

@section('main')
<div class="search-div">
    <form id="search-form" action="{{ route('searchbook.search') }}" method="GET">
        <input class="search" id="search-input" type="text" name="search" placeholder="Поиск..">
        <button id="search-button" type="submit"><span class="material-symbols-outlined">search</span></button>
    </form>

    <form id="reset-form" action="{{ route('searchbook.index') }}">
        <button style="border-radius" type="submit">Сброс</button>
    </form>
</div>

<script>
    document.getElementById("search-form").addEventListener("submit", function(event) {
        event.preventDefault();
        this.submit();
    });
    document.addEventListener('DOMContentLoaded', function() {
        const searchForm = document.getElementById('search-form');
        const searchInput = document.getElementById('search-input');

        searchForm.addEventListener('submit', function(event) {
            if (searchInput.value.trim() === '') {
                event.preventDefault();
                alert('Введите текст для поиска');
            }
        });
    });
</script>

<div class="main">
    @if(isset($results))
    <div class="searchbooks">
        <p class="s-book-title">Книги на обмен</p>
		@foreach ($results->reverse() as $post)
			<div class="block">
                <p class="searchblock-title">{{ $post->title }}</p>
                <p class="searchblock-author">{{ $post->author }}</p>
                <p class="searchblock-tel">Телефонный номер: {{ $post->tel }}</p>

				<div class="m" style="display: flex; align-items:center;justify-content:space-between">
					<p class="date" style="font-size:16px; color:rgb(0, 0, 0); font-family:Onest; ">Дата объявление: {{ $post->created_at->format("d.m.y") }}</p>
                    <p class="user">{{$post->user->name}}</p>
				</div>
				<p class="type">{{ $post->type }}</p>
			</div>
		@endforeach
        <div class="pagination">
            {{ $results->withQueryString()->links() }}
        </div>
    </div>
    @endif

    @if (!isset($results))
    <div class="searchbooks">
        <p class="s-book-title">Книги на обмен</p>
		@foreach ($posts->reverse() as $post)
			<div class="block">
                <p class="searchblock-title">{{ $post->title }}</p>
                <p class="searchblock-author">{{ $post->author }}</p>
                <p class="searchblock-tel">Телефонный номер: {{ $post->tel }}</p>

				<div class="m" style="display: flex; align-items:center;justify-content:space-between">
					<p class="date" style="font-size:16px; color:rgb(0, 0, 0); font-family:Onest; ">Дата объявление: {{ $post->created_at->format("d.m.y") }}</p>
                    <p class="user">{{$post->user->name}}</p>
				</div>
				<p class="type">{{ $post->type }}</p>
			</div>
		@endforeach


        <div class="pagination">
            {{ $posts->links() }}
        </div>
    </div>
    @endif
</div>
@endsection
