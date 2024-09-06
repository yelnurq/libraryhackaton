@extends('layouts.head')
@section("main")
<div class="main">
    <div class="all-books">
        <div class="popular-books">
            <p class="popular-books-p">Популярные</p>
            <ul>
                @foreach ($randomBooks as $book) <!-- Показать последние 6 книг -->
                <li style="list-style:none;">
                    <a style="text-decoration: none" href="{{route("books.show", $book)}}">
                        <img class="book-image" src="{{ asset('images/'.$book->image) }}" alt="Изображение книги">
                        <p  class="book-title">{{$book->title}}</p>
                        <p class="book-author">{{$book->author}}</p>
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="new-books">
            <p class="new-books-p">Лучшие новые</p>
            <ul>
                @foreach ($books->reverse()->take(5) as $book) <!-- Показать последние 6 книг -->
                <li style="list-style:none;">
                    <a style="text-decoration: none" href="{{route("books.show", $book)}}">
                        <img class="book-image" src="{{ asset('images/'.$book->image) }}" alt="Изображение книги">
                        <p class="book-title">{{$book->title}}</p>
                        <p class="book-author">{{$book->author}}</p>
                    </a>
                </li>
                @endforeach
        </div>
        <div class="classic-books">
            <p class="classic-books-p">Классическая литература</p>
            <ul>
                @foreach ($books->take(5) as $book)
                @if($book->category === 'history')
                <li style="list-style: none">
                    <a style="text-decoration: none" href="{{ route('books.show', $book) }}">
                        <img class="book-image" src="{{ asset('images/'.$book->image) }}" alt="Изображение книги">
                        <p  class="book-title">{{$book->title}}</p>
                        <p class="book-author">{{$book->author}}</p>
                    </a>
                </li>
                @endif
                @endforeach
            </ul>
        </div>
        
    </div>
    
</div>
@endsection