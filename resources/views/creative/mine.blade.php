@extends('..layouts/head')
@section('main')
<div class="search-div">
    <span class="material-symbols-outlined">
        search
        </span>
    <input class="search" type="text" placeholder="Поиск..">

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

        @foreach ($posts as $post)
        <div class="block">
            <a href={{route("post.show", $post->id)}}>
            <h3 class="title">{{$post->title}}</h3>
</a>

            <div class="m">
                <p class="date">{{$post->created_at->format("d.m.y")}}</p>

            </div>
            <p class="type">{{$post->user->name}}</p>
        </div>
        @endforeach
        <div class="pagination">
            {{$posts->links()}}
        </div>
    </div>
</div>
@endsection
