@extends('..layouts/head')
@section('main')
<div class="main">
    <div class="block-post">
        <div class="show-block">
            <div class="upper" style="text-align:left">
                <div class="left">
                    <p class="title">{{$post->title}}</p>
                    <p class="tag">
                        @foreach ($post->tags as $tag)
                        <span class="tag">{{ $tag->name }}</span>
                        @endforeach
                    </p>
                </div>
                <div class="right" style="margin-left:0">
                    <p class="user">{{$post->type}}</p>
                </div>
            </div>

            <p class="main-block">{!! $post->main !!}</p>
            @if($post->image)
                <img src="{{asset('images/'.$post->image)}}" alt="Изображение поста">
            @endif
            <div class="m">
                <p class="date">{{$post->created_at->format("d.m.y")}}</p>
            </div>
        </div>
        <div class="line"></div>
    <div class="comments">

        <p class="p-title">Комментарий</p>
        <div class="comment">
            @foreach ($post->comments as $comment)
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
        <form action="{{route("comment.store", $post)}}" method="POST">
            @csrf
            <input type="hidden" name="post_id" value="{{$post->id}}">
            <textarea class="txt" rows="10" name="text" placeholder="Оставьте свой комментарий..."></textarea>
            <button type="submit">Отправить</button>

        </form>
        @else

            <p class="else-c">Для добавления комментария необходимо <a style="color:black;cursor:pointer" href="{{route("register")}}" >войти</a>.</p>

        @endif
    </div>
    </div>

</div>

@endsection
