@extends('..layouts/head')
@section('main')
<style>


    .admin {
        max-width: 800px;
        margin: 20px auto;
        margin-bottom: 10px;
	 border: 4px solid #7c6453;
	 padding: 20px;
	 padding-left: 25px;
	 padding-right: 25px;
	 border-radius: 10px;
    }

    form {
        display: flex;
        width: 100%;
        flex-direction: column;
    }

    label {
        margin-bottom: 8px;
        font-weight: bold;
    }

    input[type="text"],
    input[type="file"],
    select {
        margin-bottom: 16px;
        padding: 8px;
        font-size: 16px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }

    input[type="file"] {
        padding: 0;
    }

    .input-file-div {
        margin-bottom: 16px;
    }

    .input-file {
        display: flex;
        align-items: center;
    }

    .file-span {
        margin-right: 10px;
    }

    button[type="submit"] {
        background-color: #521923;
        color: #fff;
        border: none;
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button[type="submit"]:hover {
        background-color: #9b1616;
    }
</style>

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
                <form action="{{route("wish.destroy", ["id"=>$w->id])}}" method="POST">
                    @csrf
                    <button type="submit">Удалить</button>
                </form>
            </div>
        @endforeach
        </div>

    </div>

</div>

<div class="admin">
    <p class="admin-title">Добавление книг</p>

    <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label for="title">Название:</label>
        <input type="text" id="title" name="title" required>

        <label for="pdf_file">PDF файл:</label>
        <input type="file" id="pdf_file" name="pdf_file" accept="application/pdf" required>

        <label for="description">Описание:</label>
        <input type="text" id="description" name="description">

        <label for="author">Автор:</label>
        <input type="text" id="author" name="author">

        <label for="lang">Язык:</label>
        <select id="lang" name="lang">
            <option value="">Выберите язык</option>
            <option value="Казахский">Казахский</option>
            <option value="Русский">Русский</option> 
            <option value="Английский">Английский</option>
            <option value="Французский">Французский</option>
            <option value="Немецкий">Немецкий</option>
            <option value="Испанский">Испанский</option>
            <option value="Китайский">Китайский</option>
            <option value="Японский">Японский</option>
        </select>

        <label for="category">Категория:</label>
        <select id="category" name="category">
            <option value="">Выберите категорию</option>
            <option value="художественная_литература">Художественная литература</option>
            <option value="нехудожественная_литература">Нехудожественная литература</option>
            <option value="наука">Наука</option>
            <option value="история">История</option>
            <option value="технологии">Технологии</option>
            <option value="биография">Биография</option>
            <option value="путешествия">Путешествия</option>
            <option value="саморазвитие">Саморазвитие</option>
            <option value="философия">Философия</option>
            <option value="поэзия">Поэзия</option>
            <option value="драма">Драма</option>
            <option value="религия">Религия</option>
            <option value="кулинария">Кулинария</option>
            <option value="здоровье">Здоровье</option>
            <option value="бизнес">Бизнес</option>
            <option value="финансы">Финансы</option>
            <option value="искусство">Искусство</option>
            <option value="образование">Образование</option>
            <option value="детские_книги">Детские книги</option>
            <option value="молодежная_литература">Молодежная литература</option>
            <option value="детектив">Детектив</option>
            <option value="ужасы">Ужасы</option>
            <option value="фэнтези">Фэнтези</option>
            <option value="романтика">Романтика</option>
        </select>
        
        <div class="input-file-div">
            <label class="input-file">
                <span class="file-span">Обложка книги: </span>
                <input type="file" name="image">		
            </label>
        </div>   

        <button type="submit">Загрузить</button>
    </form>
</div>
@endsection

