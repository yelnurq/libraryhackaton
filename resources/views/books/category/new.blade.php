@extends('layouts.head')

@section('main')
<div class="main">
    <div class="all-books">
        <div class="popular-books">
                <p class="popular-books-p">Лучшие новые</p>
            <ul>
                @foreach ($books->reverse()->take(5) as $book)
                <li style="list-style:none;">
                    <a style="text-decoration: none" href="{{route("books.show", $book)}}">
                        <img class="book-image" src="{{ asset('images/'.$book->image) }}" alt="Изображение книги">
                        <p class="book-title">{{$book->title}}</p>
                        <p class="book-author">{{$book->author}}</p>
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    
        
    </div>
</div>
@endsection
