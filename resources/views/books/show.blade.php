@extends('layouts.head')

@section('main')
<style>
 .book-form .txt {
	 font-size: 15px;
	 width: 100%;
	 overflow: auto;
	 height: 150px;
	 border-radius: 5px;
	 font-family: "Onest";
	 background-color: rgb(245, 245, 245);
	 border: 2px solid #dfc7b6;
	 resize: none;
	 color: black;
	 outline-color: none;
	 padding: 20px;
	 padding-left: 25px;
	 padding-right: 25px;

}
.book-form button {
	 border: 1px solid #dfc7b6;
	 font-family: "Onest";
	 background-color: white;
	 color: black;
	 border-radius: 5px;
	 font-size: 14px;
	 padding: 10px 15px;
	 z-index: -1;
	 transition: 300ms;
	 cursor: pointer;
	 right: 0;
	 bottom: 0px;
}
.book-details {
    position: relative; 
    overflow: hidden;
}

.book-cover-background {
    position: absolute;
    top: 0;
    left: 0;
    width: 27%;
    height: 100%;
    border-radius: 30px;
    background-image: url('{{ asset('images/'.$book->image) }}'); 
    background-size: cover; 
    background-position: center; 
    filter: blur(10px);
    z-index: 1; 
    border: 4px solid rgba(0, 0, 0, 0.3); 
}

.left-side-book, .right-side-book {
    position: relative; 
    z-index: 1; 
}

</style>
<div class="main">


        <div class="book-details">
            <div class="book-cover-background"></div>
            <div class="left-side-book">
                <img class="book-image-show" src="{{ asset('images/'.$book->image) }}" alt="Изображение книги" style="max-width: 300px; height: auto;">
                <div class="read-text">
                    <button class="read-button">
<a class="start-read" href="https://lumina.kz/storage/app/public/{{ $book->pdf_file }}" target="_blank">Начать читать</a>
                    </button>
                </div>

                <div class="book-status">
                    <form action="{{ route('books.status.update', $book->id) }}" method="POST" id="statusForm">
                        @csrf
                        @method('POST')

                        <select style="cursor:pointer" name="status" id="status" class="status-select" onchange="document.getElementById('statusForm').submit()">
                            <option value="">Добавить в список</option>
                            <option value="прочитано" {{ (isset($userStatus) && $userStatus->status == 'прочитано') ? 'selected' : '' }}>Прочитано</option>
                            <option value="хочу прочитать" {{ (isset($userStatus) && $userStatus->status == 'хочу прочитать') ? 'selected' : '' }}>Хочу прочитать</option>
                            <option value="в процессе" {{ (isset($userStatus) && $userStatus->status == 'в процессе') ? 'selected' : '' }}>В процессе</option>
                            <option value="брошено" {{ (isset($userStatus) && $userStatus->status == 'брошено') ? 'selected' : '' }}>Брошено</option>
                            <option value="любимые" {{ (isset($userStatus) && $userStatus->status == 'любимые') ? 'selected' : '' }}>Любимые</option>
                        </select>
                    </form>


                </div>
            </div>
            <div class="right-side-book">
                <div class="book-back">
                    <a href="{{ route('books.index') }}">Вернуться к списку книг   →</a>
                </div>
                <div class="right-side-title">
                    <p>{{ $book->title }}</p>
                </div>
                <div class="right-side-author">
                    <p>{{ $book->author }}</p>
                </div>
                <div class="right-side-desc">
                    <p class="desc-s-title">О книге</p>
                    <p class="desc-side">{{ $book->description }}</p>
                </div>
                <p style="margin:0"><span class="lang-span">Язык:</span> {{ $book->lang }}</p>
                <p style="margin-top: 4px"><span class="category-span">Категория:</span> {{ $book->category }}</p>

                <div class="comments" style="border: none">
                    <p class="p-title" style="color: #e68369; font-weight:500; font-size:17px">Комментарий</p>
                    @if(!Auth::check())
                    <p class="else-c">Для добавления комментария необходимо <a style="color:black;" href="{{ route('register') }}">войти.</a></p>
                    @endif
                    <div class="comment" style="border: none">
                        @foreach ($book->commentbooks as $comment)
                        <div class="comment-block">
                            <div class="user" style="display: flex; gap:40px; align-items:center">
                                <p class="user" style="font-weight:600;font-size:14px;display:flex;align-items:center; gap:10px"><img style="width:29px" src="https://lumina.kz/public/icons/userblacklogo.png"/>{{$comment->user->name}}</p>
                                <p class="date" style="color:#909090; font-size:12px">{{$comment->created_at->format("d.m.y")}}</p>

                            </div>
                            <p style="margin: 0;" class="main-text">{!! $comment->text !!}</p>

                        </div>
                        @endforeach
                    </div>

                    @if(Auth::check())
                    <form class="book-form" style="margin-top:30px" action="{{ route('commentbook.store', $book) }}" method="POST">
                        @csrf
                        <input type="hidden" name="book_id" value="{{ $book->id }}">
                        <textarea class="txt" rows="10" name="text" placeholder="Оставьте свой комментарий..."></textarea>
                        <button type="submit">Отправить</button>
                    </form>
                    @endif
                </div>
            </div>

        <script>
   document.addEventListener('DOMContentLoaded', function() {
        var statusSelect = document.getElementById('status');
        
        function updateStatusColor() {
            var selectedValue = statusSelect.value;
            var color;

            switch (selectedValue) {
                case 'прочитано':
                    color = 'green';
                    break;
                case 'хочу прочитать':
                    color = 'orangered';
                    break;
                case 'в процессе':
                    color = 'orange';
                    break;
                case 'брошено':
                    color = 'gray';
                    break;
                case 'любимые':
                    color = 'red';
                    break;

            }

            statusSelect.style.backgroundColor = color;
        }

        statusSelect.addEventListener('change', function() {
            updateStatusColor();
            document.getElementById('statusForm').submit();
        });

        updateStatusColor();
    });
        </script>


    </div>
</div>
@endsection
