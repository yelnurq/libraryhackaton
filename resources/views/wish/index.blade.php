@extends('..layouts/head')
@section('main')
<div class="main">
    
    <div class="wishes">
        <p class="wishes-title">Пожелания наших клиентов</p>
        <div class="wish-blocks">
            @foreach ($wish as $w)
            <div class="wish">
                <p>{{$w->wishtext}}</p>
                <div class="tool">
                    <p class="user">Анонимно</p>
                    <p class="date">{{$w->created_at->format("d.m.y")}}</p>
                </div>
                <form action="/" method="POST">
                    <button type="submit">Удалить</button>
                </form>
            </div>
        @endforeach
        </div>

    </div>

</div>

@endsection

