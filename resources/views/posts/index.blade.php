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



        <p class="s-book-title">Запрашиваемые книги</p>
		@foreach ($posts->reverse() as $post)
			<div class="block">
				<a href="{{ route('post.show', $post->id) }}">
					<p class="title">{!! strlen(strip_tags($post->title)) > 100 ? substr(strip_tags($post->title), 0, 150) . '...' : $post->title !!}</p>

				</a>
                <p class="block-main">{!! strlen(strip_tags($post->main)) > 500 ? substr(strip_tags($post->main), 0, 500) . '...' : $post->main !!}
                </p>

				<div class="m" style="display: flex; align-items:center;justify-content:space-between">
					<p class="date" style="font-size:16px; color:rgb(0, 0, 0); font-family:Onest; ">Дата объявление: {{ $post->created_at->format("d.m.y") }}</p>
                    <p class="user">{{$post->type}}</p>
				</div>
			</div>
		@endforeach


        <div class="pagination">
            {{ $posts->links() }}
        </div>
    </div>
    @endif
</div>
@endsection
