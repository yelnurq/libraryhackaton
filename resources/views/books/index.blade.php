@extends('layouts.head')
@section("main")
<div class="main">
    <div class="all-books">
        <div class="popular-books">
            <div class="book-tools">
                <p class="popular-books-p">Популярные</p>
                <a href="{{route("books.popular")}}" style="color:#E68369; font-size:17px; text-decoration:none; cursor: pointer;" class="popular-books-p">Еще ></a>
            </div>
            <ul>
                @foreach ($randomBooks as $book) 
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
            <div class="book-tools">
                <p class="new-books-p">Лучшие новые</p>
                <a href="{{route("books.new")}}" style="color:#E68369; font-size:17px; text-decoration:none; cursor: pointer;" class="popular-books-p">Еще ></a>

            </div>
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
        </div>
        <div class="classic-books">
            <div class="book-tools">
                <p class="classic-books-p">Классическая литература</p>
                <a href="{{route("books.classic")}}" style="color:#E68369; font-size:17px; text-decoration:none; cursor: pointer;" class="popular-books-p">Еще ></a>
            </div>
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