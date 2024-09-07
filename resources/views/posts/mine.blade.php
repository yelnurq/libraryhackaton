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
<div class="main">
    <div class="create">
        {{-- <form action="{{route("post.store")}}" method="POST">
            @csrf
            <input type="text" name="title" id="title" required>
            <input type="text" name="main" id="main" required>
            <button type="submit">Создать</button>
        </form> --}}
    </div>
    <div class="blocks">



        <p class="s-book-title">Мои объявления</p>
		@foreach ($posts->reverse() as $post)
			<div class="block">
                <a href="{{ route('post.show', $post->id) }}">
					<p class="title">{!! strlen(strip_tags($post->title)) > 100 ? substr(strip_tags($post->title), 0, 150) . '...' : $post->title !!}</p>

				</a>               <p class="searchblock-author">{{ $post->author }}</p>
                <p class="block-main">{!! strlen(strip_tags($post->main)) > 500 ? substr(strip_tags($post->main), 0, 500) . '...' : $post->main !!}
                </p>

				<div class="m" style="display: flex; align-items:center;justify-content:space-between">
					<p class="date" style="font-size:16px; color:rgb(0, 0, 0); font-family:Onest; ">Дата объявление: {{ $post->created_at->format("d.m.y") }}</p>
                    <p class="user">{{$post->user->name}}</p>
				</div>
			</div>
		@endforeach


        <div class="pagination">
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection
