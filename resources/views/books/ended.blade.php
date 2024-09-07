@extends('layouts.head')

@section('main')
<div class="main">

    <div class="all-books">
        <div class="book-nav">
            <ul>
                <li><a href="{{route("books.favorite")}}">Любимые</a></li>
                <li><a href="{{route("books.abandoded")}}">Брошено</a></li>
                <li><a style="color:#e35e00; cursor"  href="{{route("books.finished")}}">Прочитано</a></li>
                <li><a href="{{route("books.process")}}">В процессе</a></li>
                <li><a href="{{route("books.wishlist")}}">Желаемое</a></li>
            </ul>
        </div>
        <div class="popular-books">
                <p class="popular-books-p">Завершённые книги</p>
                @if($finishedBooks->isEmpty())
                <p style="text-align: center; margin-top:30px;">У вас нет завершенных книг.</p>
                @else
            <ul>
                @foreach($finishedBooks as $status)

                <li style="list-style:none;">
                    <a style="text-decoration: none" href="{{route("books.show", $status->book)}}">
                        <img class="book-image" src="{{ asset('images/'.$status->book->image) }}" alt="Изображение книги">
                        <p  class="book-title">{{$status->book->title}}</p>
                        <p class="book-author">{{$status->book->author}}</p>
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
        @endif
    
        
    </div>
</div>
@endsection
