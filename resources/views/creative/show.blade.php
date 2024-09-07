@extends('..layouts/head')
@section('main')
<div class="main">
    <div class="block-post">
        <div class="show-block">
            <div class="upper">
                <div class="block">
                    @if($creative->image)
                        <img src="{{ asset('images/'.$creative->image) }}" alt="Изображение поста">
                        @endif
                    <div class="user">
                        <p>{{$creative->user->name}}</p>    
                    </div>		

                    </div>

            </div>

            <p class="main-block">{!! $creative->main !!}</p>

            <div class="m">
                <p class="date">{{$creative->created_at->format("d.m.y")}}</p>
            </div>
        </div>
        <div class="line"></div>
    <div class="comments">

        <p class="p-title">Комментарий</p>
        <div class="comment">
            @foreach ($creative->commentcreatives as $comment)
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
        <form action="{{route("commentcreative.store", $creative)}}" method="POST">
            @csrf
            <input type="hidden" name="creative_id" value="{{$creative->id}}">
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
