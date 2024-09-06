@extends('..layouts/head')

@section('main')
<div class="search-div">
    <form id="search-form" action="{{ route('post.search') }}" method="GET">
        <input class="search" id="search-input" type="text" name="search" placeholder="Поиск..">
        <button id="search-button" type="submit"><span class="material-symbols-outlined">search</span></button>
    </form>

    <form id="reset-form" action="{{ route('post.index') }}">
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
    <div class="blocks">
        @foreach ($results as $result)
        <div class="block">
            <a href="{{ route('post.show', $result->id) }}">
                <p class="title">{{ $result->title }}</p>

            </a>
            @if($result->image)
                <img src="{{ asset('images/'.$result->image) }}" alt="Изображение поста">
            @endif
            <div class="m">
                <p class="date">{{ $result->created_at->format("d.m.y") }}</p>


            </div>
            <p class="type">{{ $result->type }}</p>
        </div>
        @endforeach
        <div class="pagination">
            {{ $results->withQueryString()->links() }}
        </div>
    </div>
    @endif

    @if (!isset($results))
    <div class="blocks">
		@foreach ($posts->reverse() as $post)
			<div class="block">
				<a href="{{ route('post.show', $post->id) }}">
					<p class="title">{{ $post->title }}</p>

				</a>
				@if($post->image)
					<img src="{{ asset('images/'.$post->image) }}" alt="Изображение поста">
				@endif
				<div class="m">
					<p class="date">{{ $post->created_at->format("d.m.y") }}</p>

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
