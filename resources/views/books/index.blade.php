@extends('layouts.head')
@section("main")
<div class="main">
    <div class="all-books">
        <div class="popular-books">
            <p>Популярные</p>
            <ul>
                @foreach ($randomBooks as $book) <!-- Показать последние 6 книг -->
                <li style="list-style:none;">
                    <a href="{{route("books.show", $book)}}">
                        <img class="book-image" src="{{ asset('images/'.$book->image) }}" alt="Изображение книги">

                    </a>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="new-books">
            <p>Лучшие новые</p>
            <ul>
                @foreach ($books->reverse()->take(5) as $book) <!-- Показать последние 6 книг -->
                <li style="list-style:none;">
                    <a href="{{route("books.show", $book)}}">
                        <img class="book-image" src="{{ asset('images/'.$book->image) }}" alt="Изображение книги">

                    </a>
                </li>
                @endforeach
        </div>
        <div class="classic-books">
            <p>Классическая литература</p>
            <ul>
                @foreach ($books->take(5) as $book)
                @if($book->category === 'history')
                <li style="list-style: none">
                    <a href="{{ route('books.show', $book) }}">
                        <img class="book-image" src="{{ asset('images/'.$book->image) }}" alt="Изображение книги">
                    </a>
                </li>
                @endif
                @endforeach
            </ul>
        </div>
        
    </div>
    
</div>
@endsection