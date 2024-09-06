@extends('layouts.head')

@section('main')
@foreach ($books as $book)
    
@if($book->category == "fiction")
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
@endif
@endforeach
@endsection
