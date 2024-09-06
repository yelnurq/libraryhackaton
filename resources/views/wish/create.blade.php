@extends('layouts/head')
@section('main')
<div class="main">

    <div class="wish-create">
        <div class="wish-create-title">
            <p>Ваши пожелания</p>
        </div>
        <form action="{{route("wish.store")}}" method="POST" class="wish-form">
            @csrf
            <label for="user" name="user" ><span>*</span> Имя: </label>
            <input type="text" class="user">
            <label for="wishtext"><span>*</span> Сообщение: </label>
            <textarea class="txt" rows="10" name="wishtext" placeholder="Напишите отзыв и свои пожелания"></textarea>
            <div class="box">
                <input type="checkbox" class="lcheckbox" required></input>
                <p class="checkbox-text">Я согласен с <a href="{{route("polites")}}">Политикой конфиденциальности</a></p>
            </div>
            <button type="submit">Отправить</button>

        </form>
    </div>
</div>
@endsection







