@extends('layouts.head')
@section("main")

<div class="main">
    
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