@extends('layouts.head')

@section('main')
<div class="main">
    <div class="all-books">
        <div class="popular-books">
                <p class="popular-books-p">Категория: Искусство</p>
            <ul>
                @foreach ($books as $book) 
                @if($book->category == "искусство")

                <li style="list-style:none;">
                    <a style="text-decoration: none" href="{{route("books.show", $book)}}">
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
