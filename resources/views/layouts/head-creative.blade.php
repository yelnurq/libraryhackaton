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
    <link rel="stylesheet" href="{{ asset("css/main.css") }}">


</head>
<body>
    <div class="header">
        <div class="container">
            <div class="header-line">
                <div class="logo" style="display: flex; align-items:center;">
                    <img style="width:120px" src="{{asset("icons/logo.png")}}" alt="">

                    <p style="font-size: 12px; color:#9E2B31;font-weight:700; line-height:15.44px; text-align:center">Карагандинская областная<br>
                        универсальная научная<br>
                        библиотека им. Н.В. Гоголя</p>
                </div>
                <div class="navbar">
                    <ul>

                        <li><img src="{{asset("icons/books.png")}}" alt=""><a href="{{route("books.index")}}">Все книги</a></li>
                        <li>
                            <div  style="margin-bottom: 0; padding-bottom:0; padding:0" class="post">
                                <img style="width:25px;margin-right:20px" src="{{asset("icons/trade.png")}}" alt="">
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
                            <li><img src="{{asset("icons/creative.png")}}" alt=""><a href="{{route("creative.index")}}">Творческие работы</a></li>
                        @auth
                            <li><img src="{{asset("icons/trade.png")}}" alt=""> <a href="{{route("post.mine")}}">Мои объявления</a></li>
                            {{-- <li><span class="material-symbols-outlined">
                            group
                                </span> <a href="{{route("friend.index")}}">Мои друзья</a></li> --}}
                        @endauth
                        <li><img src="{{asset("icons/rules.png")}}" alt=""><a href="{{route("post.rules")}}">Правила и руководства</a></li>
                    </ul>
                </div>
                @auth

                <div class="tools-book">
                    <div  style="margin-bottom: 0; padding-bottom:0" class="post">
                        <img style="width:25px;margin-right:20px" src="{{asset("icons/searchbook.png")}}" alt="">
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
                        <img style="width:25px;margin-right:20px" src="{{asset("icons/addbook.png")}}" alt="">
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
                                        <form style="margin-top:30px" class="content-form" action="{{route("searchbook.store")}}" method="POST" enctype="multipart/form-data">
                                            @csrf
    
                                            <input style="width:94%;margin-bottom:10px; background:white;padding:15px 20px; font-family:Onest; font-size:17px;border:none; border-radius:30px;" id="title" type="text" name="title" maxlength="250" required placeholder="Заголовок книги: ">
    
                                            <input style="width:94%;margin-bottom:10px; background:white;padding:15px 20px; font-family:Onest; font-size:17px;border:none; border-radius:30px;" id="author" type="text" name="author" maxlength="250" required placeholder="Автор книги: ">
                                            <input style="width:94%;; background:white;padding:15px 20px; font-family:Onest; font-size:17px;border:none; border-radius:30px;" id="tel" type="tel" name="tel" maxlength="250" required placeholder="Телефонный номер: ">
    
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
                        <img style="width:27px;margin-right:20px" src="{{asset("icons/present.png")}}" alt="">

                        <div class="block">
                            <button id="mBtn" class="openModalBtn">Поделиться творчеством</button>
    
                            <div id="mModule" class="modal">
    
                                <div class="modal-content" style="position:relative;height:230px">
                                    <div class="c">
                                        <span class="close">&times;</span>
    
                                    </div>
                                    <div class="content">
                                        <p style="text-align: center; color:rgb(0, 0, 0); font-size:20px; margin-top:0;position:absolute; top:70px; left:49%; transform:translate(-50%,-50%)">Поделиться творчеством</p>
                                        <form class="content-form" action="{{route("creative.store")}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                
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

                <div class="post">
                    <img style="width:25px;margin-right:20px" src="{{asset("icons/wish.png")}}" alt="">

                    <a style="color:#595959" href="{{route("wish.create")}}">Ваши пожелания</a>

                </div>
                @endauth

                @auth
                @if(Auth::user()->is_admin)
                <div class="post">
                    <span class="material-symbols-outlined">
                    shield_person
                    </span>
                    <a style="color: white" href="{{route("wish.index")}}">Панель админа</a>
                </div>
                @endif
                @endauth
                <div class="auth" style="padding-left:30px;">
                    <p class="category-title">Категории</p>
                    <ul>
                        <li><a href="{{ route('books.fiction') }}">Художественная литература</a></li>
                        <li><a href="{{ route('books.nonfiction') }}">Нехудожественная литература</a></li>
                        <li><a href="{{ route('books.history') }}">История</a></li>
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

                <img src="{{asset("icons/userlogo.png")}}" alt="">
                    @auth
                        <p style="font-weight: 500">{{Auth::user()->name}}</p>
                    @endauth
                    @guest
                            <div class="block">
                                <button id="mAuth" class="openModalBtn">Авторизоваться</button>

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
                <img style="width: 25px" src="{{asset("icons/logout.png")}}" alt="">
                <form style="color: black" method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit">Выйти</button>
                </form>

            </div>

            @endauth

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
</script>

</html>
