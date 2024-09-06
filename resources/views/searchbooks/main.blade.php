@extends('..layouts/head')

@section('main')
<style>
    .choose {
    padding: 20px;
    border-radius: 8px;
    margin-top:40px;
}

.choose a {
    padding: 10px 20px;
    margin: 10px;
    text-decoration: none;
    color: #fff;
    background-color: #007bff;
    border-radius: 4px;
    font-size: 16px;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

.choose a:hover {
    background-color: #0056b3;
    transform: scale(1.05);
}

.choose p {
    text-align: center;
    color: white;

}
.choose a:active {
    background-color: #004080;
}

</style>

<div class="main">

    <div class="choose">
        <p>На какую страницу вы хотите перейти?
        </p>
        <div class="redir" style="display: flex;justify-content:center;">
            <a href="{{route("searchbook.index")}}">Книги на обмен</a>
            <a href="{{route("post.index")}}">Запрашиваемые книги</a>
        </div>

    </div>
</div>
@endsection
