@extends('layouts.head')

@section('main')
<div class="main">
    <div class="wishlist">
        <h1>Список желаемого</h1>

        @if($wishlistBooks->isEmpty())
            <p>Ваш список желаемого пуст.</p>
        @else
            <ul class="list-group">
                @foreach($wishlistBooks as $status)
                    <li class="list-group-item">
                        <h5>{{ $status->book->title }}</h5>
                        <img src="{{ asset('images/'.$status->book->image) }}" alt="Изображение книги" style="max-width: 100px; height: auto;">
                        <p><strong>Автор:</strong> {{ $status->book->author }}</p>
                        <p><strong>Описание:</strong> {{ $status->book->description }}</p>
                        <p><strong>Язык:</strong> {{ $status->book->lang }}</p>
                        <p><strong>Категория:</strong> {{ $status->book->category }}</p>
                        <p>
                            <a href="{{ asset('storage/' . $status->book->pdf_file) }}" target="_blank">Читать онлайн</a>
                        </p>
                        <form action="{{ route('books.status.update', $status->book->id) }}" method="POST">
                            @csrf
                            @method('POST')

                            <label for="status">Статус:</label>
                            <select name="status" id="status">
                                <option value="прочитано" {{ ($status->status == 'прочитано') ? 'selected' : '' }}>Прочитано</option>
                                <option value="хочу прочитать" {{ ($status->status == 'хочу прочитать') ? 'selected' : '' }}>Хочу прочитать</option>
                                <option value="в процессе" {{ ($status->status == 'в процессе') ? 'selected' : '' }}>В процессе</option>
                            </select>

                            <button type="submit">Обновить статус</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</div>
@endsection
