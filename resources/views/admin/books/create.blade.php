<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Book</title>
</head>
<body>
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
            <option value="kz">Казахский</option>
            <option value="ru">Русский</option> <!-- Исправлено значение 'kz' на 'ru' для русского языка -->
            <option value="en">Английский</option>
            <option value="fr">Французский</option>
            <option value="de">Немецкий</option>
            <option value="es">Испанский</option>
            <option value="zh">Китайский</option>
            <option value="jp">Японский</option>
        </select>

        <label for="category">Категория:</label>
        <select id="category" name="category">
            <option value="">Выберите категорию</option>
            <option value="fiction">Художественная литература</option>
            <option value="non-fiction">Нехудожественная литература</option>
            <option value="science">Наука</option>
            <option value="history">История</option>
            <option value="technology">Технологии</option>
            <option value="biography">Биография</option>
            <option value="travel">Путешествия</option>
            <option value="self-help">Саморазвитие</option>
            <option value="philosophy">Философия</option>
            <option value="poetry">Поэзия</option>
            <option value="drama">Драма</option>
            <option value="religion">Религия</option>
            <option value="cooking">Кулинария</option>
            <option value="health">Здоровье</option>
            <option value="business">Бизнес</option>
            <option value="finance">Финансы</option>
            <option value="art">Искусство</option>
            <option value="education">Образование</option>
            <option value="children">Детские книги</option>
            <option value="young-adult">Молодежная литература</option>
            <option value="mystery">Детектив</option>
            <option value="horror">Ужасы</option>
            <option value="fantasy">Фэнтези</option>
            <option value="romance">Романтика</option>
            <!-- Добавьте больше категорий по вашему усмотрению -->
        </select>
        <div class="input-file-div">
            <label class="input-file">
                <span class="file-span">Обложка книги: </span>
                <input type="file" name="image">		
             </label>
        </div>   
        <button type="submit">Загрузить</button>
    </form>
</body>
</html>
