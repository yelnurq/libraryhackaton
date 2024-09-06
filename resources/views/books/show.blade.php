@extends('layouts.head')

@section('main')
<div class="main">
    <div class="book-details">
        <h1>{{ $book->title }}</h1>
        <img src="{{ asset('images/'.$book->image) }}" alt="Изображение книги" style="max-width: 300px; height: auto;">
        <p><strong>Автор:</strong> {{ $book->author }}</p>
        <p><strong>Описание:</strong> {{ $book->description }}</p>
        <p><strong>Язык:</strong> {{ $book->lang }}</p>
        <p><strong>Категория:</strong> {{ $book->category }}</p>
        
        <p>
            <a href="{{ asset('storage/' . $book->pdf_file) }}" target="_blank">Читать онлайн</a>
        </p>
        <p>
            <a href="{{ route('books.index') }}">Вернуться к списку книг</a>
        </p>
        <div class="comments">

            <p class="p-title">Комментарий</p>
            <div class="comment">
                @foreach ($book->commentbooks as $comment)
                <div class="comment-block">
                    <div class="user">
    
                            <p class="user">Пользователь: {{$comment->user->name}}</p>
                    </div>
                    <p class="main-text">{!! $comment->text !!}</p>
                    <div class="m">
                        <p class="date">{{$comment->created_at->format("d.m.y")}}</p>
                    </div>
                </div>
                @endforeach
            </div>
    
            @if(Auth::check())
            <form action="{{route("commentbook.store", $book)}}" method="POST">
                @csrf
                <input type="hidden" name="book_id" value="{{$book->id}}">
                <textarea class="txt" rows="10" name="text" placeholder="Оставьте свой комментарий..."></textarea>
                <button type="submit">Отправить</button>
    
            </form>
            @else
    
                <p class="else-c">Для добавления комментария необходимо <a style="color:white;" href="{{route("register")}}" >войти</a>.</p>
    
            @endif
        </div>
    </div>
</div>
@endsection
