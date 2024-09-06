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
        @foreach ($results as $post)
        <div class="block">
            <p style="color:rgb(216, 216, 216);margin-top:0" class="title">{{ $post->title }}</p>
            <p style="color:rgb(200,200,200);margin-top:0; margin-bottom:30px; font-size:13px" class="author">{{ $post->author }}</p>
            <p style="color:rgb(170 154 147);margin-top:0; font-size:13px; float:right; text-decoration:underline;" class="tel">{{ $post->tel }}</p>

            <div class="m">
                <p class="date" style="font-size:13px; color:rgb(204, 204, 204)">{{ $post->created_at->format("d.m.y") }}</p>

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
		@foreach ($posts->reverse() as $post)
			<div class="block">
                <p style="color:rgb(216, 216, 216);margin-top:0" class="title">{{ $post->title }}</p>
                <p style="color:rgb(200,200,200);margin-top:0; font-size:13px" class="author">{{ $post->author }}</p>
                <p style="color:rgb(205, 205, 205);margin-top:0; font-size:13px" class="author">{{ $post->tel }}</p>

				<div class="m">
					<p class="date" style="font-size:13px; color:rgb(204, 204, 204)">{{ $post->created_at->format("d.m.y") }}</p>

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
