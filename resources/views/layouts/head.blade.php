<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>"Электронная библиотека"</title>
    <link rel="icon" href="{{asset("css/logoicon.svg")}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Manrope">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&family=Onest:wght@100..900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <link id="theme-style" rel="stylesheet" href="{{ asset("css/main.css") }}">


</head>

<body>
    <style>
.modal {
    left: 0;
	 z-index: 1000;
	 top: 0;
	 display: none;
	 position: fixed;
	 overflow: hidden;
	 background-color: rgba(0, 0, 0, 0.8);
	 width: 100%;
	 height: 100%;
	 margin: 0;
	 animation: move 1s;
}

.modal-content {
    animation: fade 10s ease-in;
	 background-color: #161618;
	 padding: 20px;
	 margin: 15% auto;
	 width: 70%;
	 border-radius: 20px;
	 color: black;
	 height: 350px;

}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}
body .header-r .auth .auth-name .block .modal-content {
    animation: fade 10s ease-in;
    background-color: #EFE5E5;
    padding: 20px;
    margin: 15% auto;
    width: 70%;
    height: 33%;
    border-radius: 20px;
    color: black;
    padding-bottom: 20px;
}



@media only screen and (max-width: 600px) {
    body .header-r .auth .auth-name .block .modal-content {
        height: 40%;
        margin: 35% auto;
    }
}

body .header-r .auth .auth-name .block .modal-content .c {
    margin-bottom: 0;
    color: rgba(0, 0, 0, 0.795);
    font-size: 36px;
    display: flex;
    justify-content: right;
}

body .header-r .auth .auth-name .block .modal-content .c span {
    margin-right: 0;
    margin-bottom: 16px;
}

body .header-r .auth .auth-name .block .modal-content .content {
    display: flex;
    justify-content: space-around;
}

body .header-r .auth .auth-name .block .modal-content .content .left-side {
    width: 40%;
    word-wrap: break-word;
    text-align: left;
    font-family: "Onest";
}

@media only screen and (max-width: 1000px) {
    body .header-r .auth .auth-name .block .modal-content .content .left-side {
        display: none;
    }
}

body .header-r .auth .auth-name .block .modal-content .content .left-side .u-side {
    font-size: 30px;
    width: 500px;
}

@media only screen and (max-width: 1400px) and (min-width: 1300px) {
    body .header-r .auth .auth-name .block .modal-content .content .left-side .u-side {
        width: 400px;
    }
}

@media only screen and (max-width: 1300px) {
    body .header-r .auth .auth-name .block .modal-content .content .left-side .u-side {
        width: 300px;
        font-size: 25px;
    }
}

body .header-r .auth .auth-name .block .modal-content .content .content-form {
    position: relative;
}

body .header-r .auth .auth-name .block .modal-content .content .content-form .tools {
    display: flex;
    align-items: center;
    margin-bottom: 70px;
    justify-content: space-between;
}

body .header-r .auth .auth-name .block .modal-content .content .content-form .tools a {
    color: black;
    font-size: 20px;
    text-decoration: none;
}

@media only screen and (max-width: 600px) {
    body .header-r .auth .auth-name .block .modal-content .content .content-form .tools a {
        font-size: 17px;
    }
}

body .header-r .auth .auth-name .block .modal-content .content .content-form .user {
    display: flex;
    align-items: center;
    margin-bottom: 15px;
    font-family: "Onest";
}

body .header-r .auth .auth-name .block .modal-content .content .content-form input {
    width: 400px;
    margin-bottom: 20px;
    padding: 5px;
    border: none;
    border-bottom: 1px solid rgb(0, 0, 0);
    font-family: "Onest";
    outline-color: none;
    background: transparent;
    color: black;
    font-size: 25px;
}

@media only screen and (max-width: 400px) {
    body .header-r .auth .auth-name .block .modal-content .content .content-form input {
        width: 240px;
        font-size: 17px;
    }
}

@media only screen and (max-width: 600px) and (min-width: 400px) {
    body .header-r .auth .auth-name .block .modal-content .content .content-form input {
        width: 260px;
        font-size: 17px;
    }
}

body .header-r .auth .auth-name .block .modal-content .content .content-form .checkbox {
    width: auto;
    font-size: 18px;
    color: black;
    accent-color: #000;
}

@media only screen and (max-width: 600px) {
    body .header-r .auth .auth-name .block .modal-content .content .content-form .checkbox {
        height: 12px;
    }
}

body .header-r .auth .auth-name .block .modal-content .content .content-form .checkbox-span {
    font-size: 17px;
    color: black;
}

body .header-r .auth .auth-name .block .modal-content .content .content-form input::placeholder {
    color: black;
    font-size: 20px;
    font-family: "Onest";
}

@media only screen and (max-width: 600px) {
    body .header-r .auth .auth-name .block .modal-content .content .content-form input::placeholder {
        font-size: 13px;
    }
}

body .header-r .auth .auth-name .block .modal-content .content .content-form input:focus {
    outline: none;
}

body .header-r .auth .auth-name .block .modal-content .content .content-form button {
    font-family: "Onest";
    border-radius: 10px;
    border: 1px solid black;
    color: black;
    background: #EFE5E5;

    padding-left: 10px;
    padding-right: 10px;
    transition: 300ms;
    font-size: 17px;
}

body .header-r .auth .auth-name .block .modal-content .content .content-form button:hover {
    color: #4ba569;
}

body .header-r .auth .auth-name .block .modal-content .content .content-form .register-a {
    position: absolute;
    bottom: 15px;
    right: 0;
    color: black;
    text-decoration: none;
}

body .header-r .auth .auth-name .login {
    margin: 0;
    font-size: 17px;
    color: black;
    text-decoration: none;
    transition: 300ms;
}

body .header-r .auth .auth-name .login:hover {
    color: #62b4da;
}

body .header-r .auth .auth-name span {
    margin-right: 20px;
    color: #000;
}

body .header-r .auth .auth-name p {
    margin: 0;
    font-size: 17px;
    color: #000;
}


body .header-r .auth .log form {
    display: flex;
    align-items: center;
}

body .header-r .auth .log form span {
    margin-right: 20px;
    color: black;
}

body .header-r .auth .log form a {
    text-decoration: none;
    color: black;
    font-size: 17px;
    transition: 300ms;
}

body .header-r .auth .log form a:hover {
    color: #a14e4e;
}

body .header-r .auth .light {
    display: flex;
    bottom: 30px;
    width: 100%;
    position: fixed;
    align-items: center;
    border: none;
    font-family: "Onest";
    background: none;
    color: black;
    font-size: 17px;
    padding-left: 0;
    transition: 300ms;
}

body .header-r .auth .light span {
    margin-right: 20px;
}

body .header-r .auth .light button {
    border: none;
    font-family: "Onest";
    background: none;
    margin-top: 5px;
    color: black
    font-size: 17px;
    padding-left: 0;
    transition: 300ms;
}

body .header-r .auth .light button:hover {
    transform: scale(1.15);
}
body .header-r .auth .auth-name .block .openModalBtn {
    font-family: "Onest";
    font-size: 16px;
    border: none;
    background: none;
    color: black;
    padding-left: 0;
    cursor: pointer;
    transition: 300ms;
}

body .header-r .auth .auth-name .block .openModalBtn:hover {
    color: #4ba569; 
}

    </style>
    <div class="header">
        <div class="container">
            <div class="header-line">
                <a style="text-decoration:none;" href="{{route("books.index")}}"><div class="logo" style="display: flex; align-items:center;">
						<img style="width:120px" src="https://lumina.kz/public/icons/logo.png" alt="">

                    <p style="font-size: 12px; color:#9E2B31;font-weight:700; line-height:15.44px; text-align:center">Карагандинская областная<br>
                        универсальная научная<br>
                        библиотека им. Н.В. Гоголя</p>
							
                </div><a/>
                <div class="navbar">
                    <ul>

                        <li><img src="https://lumina.kz/public/icons/books.png" alt=""><a href="{{route("books.index")}}">Все книги</a></li>
                        <li>
                            <div  style="margin-bottom: 0; padding-bottom:0; padding:0" class="post">
                                <img style="width:25px;margin-right:20px" src="https://lumina.kz/public/icons/trade.png" alt="">
                                <div style="padding: 0" class="block">
                                    <button id="mBtn" class="openModalBtn">Объявления о книгах</button>

                                    <div id="mModule" class="modal">

                                        <div class="modal-content" style="background:#EAD1D1;height:230px ">
                                            <div class="c">
                                                <span class="close">&times;</span>

                                            </div>
                                            <div class="content">
                                                <div class="choose" style="text-align: center">
                                                    <p style="font-size: 20px;font-weight:700">На какую страницу вы хотите перейти?
                                                    </p>
                                                    <div class="redir" style="display: flex;justify-content:center;gap:15px;">
                                                        <a href="{{route("searchbook.index")}}">Книги на обмен</a>
                                                        <a href="{{route("post.index")}}">Запрашиваемые книги</a>
                                                    </div>

                                                </div>
                                                  <script>
                                                    document.addEventListener('DOMContentLoaded', function() {
                                                        var form = document.querySelector('.content-form');
                                                        var submitButton = form.querySelector('button[type="submit"]');

                                                        form.addEventListener('submit', function() {
                                                            submitButton.disabled = true;

                                                        });
                                                    });
                                                </script>

                                            </div>


                                        </div>
                                    </div>
                                </div>

                            </div>
                        </li>
                            <li><img src="https://lumina.kz/public/icons/creative.png" alt=""><a href="{{route("creative.index")}}">Творческие работы</a></li>
                        @auth
                        <li><img src="https://lumina.kz/public/icons/trade.png" alt=""> <a href="{{route("post.mine")}}">Мои объявления</a></li>
                        <li><img src="https://lumina.kz/public/icons/order.png" alt=""> <a href="{{route("order.mine")}}">Мои заказы</a></li>
                        <li><img src="https://lumina.kz/public/icons/favorite.png" alt=""> <a href="{{route("books.favorite")}}">Избранные</a></li>
                        <li><img src="https://lumina.kz/public/icons/cart.png" alt=""> <a href="{{route("cart.index")}}">Корзина</a></li>

                            {{-- <li><span class="material-symbols-outlined">
                            group
                                </span> <a href="{{route("friend.index")}}">Мои друзья</a></li> --}}
                        @endauth
                        <li><img src="https://lumina.kz/public/icons/rules.png" alt=""><a href="{{route("post.rules")}}">Правила и руководства</a></li>
                    </ul>
                </div>
                @auth

                <div class="tools-book">
                    <div  style="margin-bottom: 0; padding-bottom:0" class="post">
                        <img style="width:25px;margin-right:20px" src="https://lumina.kz/public/icons/searchbook.png" alt="">
                        <div class="block">
                            <button id="mBtn" class="openModalBtn">Ищу книгу</button>

                            <div id="mModule" class="modal">

                                <div class="modal-content">
                                    <div class="c">
                                        <span class="close">&times;</span>

                                    </div>
                                    <div class="content">
                                        <form class="content-form" action="{{route("post.store")}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="user">
                                                <span class="material-symbols-outlined">
                                                    account_box
                                                    </span>
                                                <select name="type" class="slc">
                                                    <option value="Анонимно">Анонимно</option>
                                                    <option value="{{Auth::user()->name}}">{{Auth::user()->name}}</option>

                                                </select>
                                                <input id="title" type="text" name="title" maxlength="250" required placeholder="Заголовок книги: ">

                                            </div>
                                            <textarea id="main" class="c-text" name="main" rows="8" cols="80" placeholder="Укажите детали поиска...." required></textarea>

                                           {{-- <div class="form-group">
                                                <label for="tags">Выберите теги:</label>
                                                <select multiple class="form-control" id="tags" name="tags[]">
                                                    @foreach($tags as $tag)
                                                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                                    @endforeach
                                                </select>
                                                <script>
                                                    $(document).ready(function() {
                                                        $('#tags').select2();
                                                    });
                                                </script>
                                            </div>     --}}
                                            <button type="submit">Отправить</button>
                                          </form>
                                          <script>
                                            document.addEventListener('DOMContentLoaded', function() {
                                                var form = document.querySelector('.content-form');
                                                var submitButton = form.querySelector('button[type="submit"]');

                                                form.addEventListener('submit', function() {
                                                    submitButton.disabled = true;

                                                });
                                            });
                                        </script>

                                    </div>


                                </div>
                            </div>
                        </div>

                    </div>

                    <div style="margin-bottom: 0; padding-bottom:0" class="post">
                        <img style="width:25px;margin-right:20px" src="https://lumina.kz/public/icons/addbook.png" alt="">
                        <div class="block">
                            <button id="mBtn" class="openModalBtn">Выставить книгу</button>

                            <div id="mModule" class="modal">

                                <div class="modal-content" style="position:relative;background:#EAD1D1;
">
                                    <div class="c">
                                        <span class="close">&times;</span>

                                    </div>
                                    <div class="content">
                                        <p style="text-align: center; color:rgb(0, 0, 0); font-size:20px; margin-top:0;position:absolute; top:70px; left:49%; transform:translate(-50%,-50%)">Выставить книгу для обмена</p>
                                        <form style="margin-top:50px" class="content-form" action="{{route("searchbook.store")}}" method="POST" enctype="multipart/form-data">
                                            @csrf

                                            <input style="width:90%;margin-bottom:10px; background:white;padding:15px 20px; font-family:Onest; font-size:17px;border:none; border-radius:30px;" id="title" type="text" name="title" maxlength="250" required placeholder="Заголовок книги: ">

                                            <input style="width:90%;margin-bottom:10px; background:white;padding:15px 20px; font-family:Onest; font-size:17px;border:none; border-radius:30px;" id="author" type="text" name="author" maxlength="250" required placeholder="Автор книги: ">
                                            <input style="width:90%;; background:white;padding:15px 20px; font-family:Onest; font-size:17px;border:none; border-radius:30px;" id="tel" type="tel" name="tel" maxlength="250" required placeholder="Телефонный номер: ">

                                            <div class="btn" style="text-align: center;margin-top:15px;">
                                                <button class="modal-button-content" type="submit">Отправить</button>

                                            </div>
                                        </form>
                                          <script>
                                            document.addEventListener('DOMContentLoaded', function() {
                                                var form = document.querySelector('.content-form');
                                                var submitButton = form.querySelector('button[type="submit"]');

                                                form.addEventListener('submit', function() {
                                                    submitButton.disabled = true;

                                                });
                                            });
                                        </script>

                                    </div>


                                </div>
                            </div>
                        </div>

                    </div>

                    <div style="margin-bottom: 0; padding-bottom:0" class="post">
                        <img style="width:27px;margin-right:20px" src="https://lumina.kz/public/icons/present.png" alt="">

                        <div class="block">
                            <button id="mBtn" class="openModalBtn">Поделиться творчеством</button>

                            <div id="mModule" class="modal">

                                <div class="modal-content" style="position:relative;height:300px">
                                    <div class="c">
                                        <span class="close">&times;</span>

                                    </div>
                                    <div class="content">
                                        <p style="text-align: center; color:rgb(0, 0, 0); font-size:20px; margin-top:0;position:absolute; top:70px; left:49%; transform:translate(-50%,-50%)">Поделиться творчеством</p>
                                        <form style="margin-top:60px;" class="content-form" action="{{route("creative.store")}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="main">
                                                <input type="text" name="main" placeholder="Опишите свое творение: ">
                                            </div>
                                            <div class="input-file-div">
                                                <label class="input-file">
                                                    <span class="file-span">Выберите файл</span>
                                                    <input type="file" name="image">
                                                 </label>
                                            </div>
                                            <div class="btn" style="text-align: center;margin-top:15px;">
                                                <button class="modal-button-content" type="submit">Отправить</button>

                                            </div>
                                        </form>
                                          <script>
                                            document.addEventListener('DOMContentLoaded', function() {
                                                var form = document.querySelector('.content-form');
                                                var submitButton = form.querySelector('button[type="submit"]');

                                                form.addEventListener('submit', function() {
                                                    submitButton.disabled = true;

                                                });
                                            });
                                        </script>

                                    </div>


                                </div>
                            </div>
                        </div>

                    </div>
                </div>
				@endauth
				<div class="tools-book" style="padding-bottom:15px;">
					@auth
                      <div class="post" style="margin-bottom:0;padding-bottom:0;padding-top:8px;">
                    			<img style="width:25px;margin-right:20px" src="https://lumina.kz/public/icons/wish.png" alt="">

                   			 <a class="navbar-btn-tools" href="{{route("wish.create")}}">Ваши пожелания</a>
					</div>
					@endauth
                    <div class="post" style="margin-bottom:0;padding-bottom:0">
                        <img style="width:25px;margin-right:20px" src="https://lumina.kz/public/icons/wish.png" alt="">
                        <button id="toggle-theme">Режим для слабовидящих</button>


                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                const toggleButton = document.getElementById('toggle-theme');
                                const themeStyle = document.getElementById('theme-style');
                    
                                const currentTheme = localStorage.getItem('theme') || 'main';
                                themeStyle.href = `/css/${currentTheme}.css`;
                                console.log(`Current theme set to: ${currentTheme}`);
                    
                                toggleButton.addEventListener('click', function() {
                                    let newTheme = themeStyle.href.includes('main') ? 'high-contrast' : 'main';
                                    themeStyle.href = `/css/${newTheme}.css?v=${new Date().getTime()}`;
                                    localStorage.setItem('theme', newTheme);
                                    console.log(`Switched to theme: ${newTheme}`);
                                });
                            });
                        </script>
					</div>
                    <div class="post" style="margin-bottom:0;padding-bottom:0">
						<img style="width:25px;margin-right:20px" src="https://lumina.kz/public/icons/randombook.png" alt="">

						<a class="navbar-btn-tools"  href="{{ route('books.random') }}">Случайная книга</a>
					</div>
				<div class="post" style="margin-bottom:0;padding-bottom:0">
						<img style="width:25px;margin-right:20px" src="https://lumina.kz/public/icons/sports.png" alt="">

						<a class="navbar-btn-tools"  href="{{ route('quiz.index') }}">Викторина</a>
					</div>
                </div>


                @auth
                @if(Auth::user()->is_admin)
            <div class="tools-book">
                <div class="post" style="margin-bottom:0;padding-bottom:0">
                    <img style="width:25px;margin-right:20px" src="https://lumina.kz/public/icons/admin.png" alt="">

                    <a class="navbar-btn-tools"  href="{{route("wish.index")}}">Панель админа</a>
                </div>
                <div class="post" style="margin-bottom:0;padding-bottom:0">
                    <img style="width:25px;margin-right:20px" src="https://lumina.kz/public/icons/orders.png" alt="">

                    <a class="navbar-btn-tools"  href="{{route("order.index")}}">Заказы клиентов</a>
                </div>
            </div>
                @endif
                @endauth
					
                <div class="auth" style="padding-left:30px;">
                    <p class="category-title">Категории</p>
                    <ul>
                        <li><a href="{{ route('books.fiction') }}">Художественная литература</a></li>
                        <li><a href="{{ route('books.nonfiction') }}">Нехудожественная литература</a></li>
                        <li><a href="{{ route('books.history') }}">История</a></li>
                        <li><a href="{{ route('books.health') }}">Здоровье</a></li>
                        <li><a href="{{ route('books.travel') }}">Путешествия</a></li>
                        <li><a href="{{ route('books.science') }}">Наука</a></li>
                        <li><a href="{{ route('books.drama') }}">Драма</a></li>
                        <li><a href="{{ route('books.art') }}">Искусство</a></li>
                        <li><a href="{{ route('books.mystery') }}">Детектив</a></li>
                        <li><a href="{{ route('books.horror') }}">Ужасы</a></li>
                        <li><a href="{{ route('books.romance') }}">Романтика</a></li>
                        <li><a href="{{ route('books.classic') }}">Классика</a></li>
                        <li><a href="{{ route('books.selfhelp') }}">Саморазвитие</a></li>
                        <li><a href="{{ route('books.cooking') }}">Кулинария</a></li>
                        <li><a href="{{ route('books.children') }}">Детская литература</a></li>
                        <li><a href="{{ route('books.fantasy') }}">Фэнтези</a></li>
                    </ul>


                </div>

            </div>
        </div>
    </div>
    <div class="header-r">
        <div class="auth">
            <div class="auth-name">

                    @auth
                        <img src="https://lumina.kz/public/icons/userlogo.png" alt="">
                        <p style="font-weight: 500">{{Auth::user()->name}}</p>
                    @endauth
                    @guest
                            <div class="block">
                                <div class="log-auth" style="display: flex;align-items:center;gap:10px">
                                    <img src="https://lumina.kz/public/icons/login.png"/>
                                    <button  style="font-family:Onest;font-size:16px;border: none; background:none;color: black;background: none;border: none;font-size: 16px;padding-left: 0;cursor: pointer;transition: 300ms;" id="mAuth" class="openModalBtn">Авторизоваться</button>

                                </div>
                               <div id="mAuthModule" class="modal">

                                <div class="modal-content">
                                    <div class="c">
                                        <span class="close">&times;</span>

                                    </div>
                                    <div class="content">
                                        <div class="left-side">
                                            <div class="title-side">
                                                <p class="u-side">Добро пожаловать!</p>
                                                <p class="u-side">Электронная библиотека – это ваш идеальный спутник в мире книг. </p>
                                            </div>
                                        </div>
                                        <form class="content-form" method="POST" action="{{ route('login') }}">
                                            @csrf

                                            <div>
                                                <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Почта: *"  class="input-required"/>

                                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                            </div>

                                            <div class="mt-4">

                                                <x-text-input id="password" class="block mt-1 w-full"
                                                                type="password"
                                                                name="password"
                                                                required autocomplete="current-password" placeholder="Пароль: *" />

                                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                            </div>
                                            <div class="block mt-4">
                                                <label for="remember_me" class="inline-flex items-center">
                                                    <input id="remember_me" type="checkbox" class="checkbox" name="remember" >
                                                    <span class="checkbox-span" class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Запомнить меня') }}</span>
                                                </label>

                                            </div>
                                            <div class="tools">


                                                <div class="remember">
                                                    @if (Route::has('password.request'))
                                                        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                                                            {{ __('Забыли пароль?') }}
                                                        </a>
                                                    @endif
                                                </div>
                                                <div>
                                                    <x-primary-button>
                                                        {{ __('Войти') }}
                                                    </x-primary-button>
                                                </div>
                                            </div>
                                            <label for="register">
                                                <a class="register-a" href="{{route("register")}}">У вас еще нет аккаунта?</a>
                                            </label>
                                        </form>

                                    </div>


                                </div>
                            </div>
                            </div>
                    @endguest
                </div>
            @auth
            <div class="log">
                <img style="width: 25px" src="https://lumina.kz/public/icons/logout.png" alt="">
                <form style="color: black" method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit">Выйти</button>
                </form>

            </div>

            @endauth

        </div>
    </div>

    <div class="content">
        <div class="blocks">
            <div class="block">
                <img src="{{asset("blocks/block1image.png")}}" alt="">
                <p class="block-first">Библиотека будущего —<br> читайте, создавайте, делитесь</p>
            </div>

            <div class="block-second">
                <img src="{{asset("blocks/blocks2.png")}}" alt="">
                <p class="block-second-p">Присоединяйтесь и делитесь<br> своим вдохновением!</p>
            </div>
        </div>
    </div>
    @yield('main')

</body>
<script>
	var openModalBtns = document.querySelectorAll('.openModalBtn');

    var modals = document.querySelectorAll('.modal');

    var closeBtns = document.querySelectorAll('.close');


    document.addEventListener('click', function(event) {
        var module = document.getElementById('module');
        if (event.target === module) {
            module.style.display = 'none';
        }
    });

    openModalBtns.forEach(function(btn, index) {
        btn.addEventListener('click', function() {
            modals[index].style.display = 'block';
        });
    });

    closeBtns.forEach(function(btn, index) {
        btn.addEventListener('click', function() {
            modals[index].style.display = 'none';
        });
    });

    function show() {
        var txt = document.querySelectorAll("showDIV");
        if (txt.style.display === "none") {
            txt.style.display = "block";
        } else {
            txt.style.display = "none";
        }
    }
    document.addEventListener('DOMContentLoaded', function() {
        var header = document.querySelector('.header');
        var toggleButton = document.getElementById('toggleButton');

        if (window.innerWidth <= 600) {
            toggleButton.style.display = 'block';
        }

        toggleButton.addEventListener('click', function() {
            if (header.style.display === 'none') {
                header.style.display = 'block';
                header.classList.add('fade-in');
            } else {
                header.style.display = 'none';
            }
        });
    });
    document.getElementById('mAuth').onclick = function() {
        document.getElementById('mAuthModule').style.display = 'block';
    }

    document.getElementsByClassName('close')[0].onclick = function() {
        document.getElementById('mAuthModule').style.display = 'none';
    }

    window.onclick = function(event) {
        if (event.target == document.getElementById('mAuthModule')) {
            document.getElementById('mAuthModule').style.display = 'none';
        }
    }


</script>
</script>

</html>
