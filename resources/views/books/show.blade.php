@extends('layouts.head')

@section('main')
<div class="main">


    <div class="book-details">
        <div class="left-side-book">
            <img class="book-image-show" src="{{ asset('images/'.$book->image) }}" alt="Изображение книги" style="max-width: 300px; height: auto;">
            <div class="read-text">
                <button class="read-button">
                    <a class="start-read" href="{{ asset('storage/' . $book->pdf_file) }}" target="_blank">Начать читать</a>
                </button>                
            </div>
            
            <div class="book-status">
                <form action="{{ route('books.status.update', $book->id) }}" method="POST" id="statusForm">
                    @csrf
                    @method('POST')
                
                    <select name="status" id="status" onchange="document.getElementById('statusForm').submit()">
                        <option value="">Добавить в список</option>
                        <option value="прочитано" {{ (isset($userStatus) && $userStatus->status == 'прочитано') ? 'selected' : '' }}>Прочитано</option>
                        <option value="хочу прочитать" {{ (isset($userStatus) && $userStatus->status == 'хочу прочитать') ? 'selected' : '' }}>Хочу прочитать</option>
                        <option value="в процессе" {{ (isset($userStatus) && $userStatus->status == 'в процессе') ? 'selected' : '' }}>В процессе</option>
                    </select>
                </form>
                
            </div>
        </div>
        <div class="right-side-book">
            <p>
                <a href="{{ route('books.index') }}">Вернуться к списку книг</a>
            </p>
            <h1>{{ $book->title }}</h1>
            <p><strong>Автор:</strong> {{ $book->author }}</p>
            <p><strong>Описание:</strong> {{ $book->description }}</p>
            <p><strong>Язык:</strong> {{ $book->lang }}</p>
            <p><strong>Категория:</strong> {{ $book->category }}</p>
            
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
                <form action="{{ route('commentbook.store', $book) }}" method="POST">
                    @csrf
                    <input type="hidden" name="book_id" value="{{ $book->id }}">
                    <textarea class="txt" rows="10" name="text" placeholder="Оставьте свой комментарий..."></textarea>
                    <button type="submit">Отправить</button>
                </form>
                @else
                    <p class="else-c">Для добавления комментария необходимо <a style="color:white;" href="{{ route('register') }}">войти</a>.</p>
                @endif
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var statusSelect = document.getElementById('status');
                var statusForm = document.getElementById('statusForm');
        
                statusSelect.addEventListener('change', function() {
                    statusForm.submit();
                });
            });
        </script>
        
            
    </div>
</div>
@endsection
