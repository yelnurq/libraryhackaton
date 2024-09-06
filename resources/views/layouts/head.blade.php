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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Jost">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <link rel="stylesheet" href="{{ asset("css/main.css") }}">


</head>
<body>
    <div class="header">
        <div class="container">
            <div class="header-line">
                <div class="navbar">

                    <ul>
                        <li><span class="material-symbols-outlined">
                            library_books
                            </span><a href="/">Все книги</a></li>
                        <li><span class="material-symbols-outlined">
                            dictionary
                            </span><a href="{{route("searchbook.main")}}">Объявления о книгах</a></li>
                            <li><span class="material-symbols-outlined">
                                local_florist
                                </span><a href="{{route("post.index")}}">Творческие работы</a></li>
                        @auth
                            <li><span class="material-symbols-outlined">
                                library_books
                            </span> <a href="{{route("post.mine")}}">Мои объявления</a></li>
                            {{-- <li><span class="material-symbols-outlined">
                            group
                                </span> <a href="{{route("friend.index")}}">Мои друзья</a></li> --}}
                        @endauth
                        <li><span class="material-symbols-outlined">
                            developer_guide
                            </span><a href="{{route("post.rules")}}">Правила и руководства</a></li>
                    </ul>
                </div>
                @auth
                <div class="post">
                    <span class="material-symbols-outlined">
                        feature_search
                        </span>
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
                <div class="post">
                    <span class="material-symbols-outlined">
                        new_label
                        </span>
                    <div class="block">
                        <button id="mBtn" class="openModalBtn">Выставить книгу</button>

                        <div id="mModule" class="modal">

                            <div class="modal-content" style="position:relative;">
                                <div class="c">
                                    <span class="close">&times;</span>

                                </div>
                                <div class="content">
                                    <p style="text-align: center; color:rgb(203, 203, 203); font-size:16px; margin-top:0;position:absolute; top:70px; left:49%; transform:translate(-50%,-50%)">Выставить книгу для обмена</p>
                                    <form style="margin-top:30px" class="content-form" action="{{route("searchbook.store")}}" method="POST" enctype="multipart/form-data">
                                        @csrf

                                        <input style="width:94%;margin-bottom:10px" id="title" type="text" name="title" maxlength="250" required placeholder="Заголовок книги: ">

                                        <input style="width:94%;margin-bottom:10px" id="author" type="text" name="author" maxlength="250" required placeholder="Автор книги: ">
                                        <input style="width:94%;" id="tel" type="tel" name="tel" maxlength="250" required placeholder="Телефонный номер: ">

                                        <button style="margin-top:40px;" type="submit">Отправить</button>
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
                <div class="post">
                    <span class="material-symbols-outlined">
                        mail
                        </span>
                    <a style="color:white" href="{{route("wish.create")}}">Ваши пожелания</a>

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
                <div class="auth">
                    <div class="auth-name">

                        <span class="material-symbols-outlined">
                            account_box
                            </span>
                            @auth
                                <p>{{Auth::user()->name}}</p>
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

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <span class="material-symbols-outlined">
                                logout
                                </span>
                            <x-responsive-nav-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Выйти') }}
                            </x-responsive-nav-link>
                        </form>

                    </div>

                    @endauth

                </div>

            </div>
        </div>
    </div>
	<div class="b-nav">
    <div class="bottom-navbar">
		<div>
			             <a href="{{route("post.index")}}"><span class="material-symbols-outlined">
                            home
                            </span></a>
		</div>
		<div class="post">
					@guest
						 <a href="{{route("register")}}"><span class="material-symbols-outlined">
                            add
                            </span></a>@endguest
					@auth
                    <div class="block">
                        <button id="mBtn" class="openModalBtn"><span class="material-symbols-outlined">
                        add
                        </span></button>

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
                                            <input id="title" type="text" name="title" maxlength="250" required placeholder="Заголовок: ">

                                        </div>
                                        <textarea id="main" class="c-text" name="main" rows="8" cols="80" placeholder="Напишите свою историю здесь..." required></textarea>

                                        <div class="input-file-div">
                                            <label class="input-file">
                                                <span class="file-span">Выберите файл</span>
                                                <input type="file" name="image">
                                             </label>
                                        </div>
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
													                @endauth

                        </div>
							<a href="{{route("register")}}"><span class="material-symbols-outlined">
														add
							</span></a>
                    </div>

                </div>




    </div>
	</div>

    <div class="header-r">

        <div class="container">
            <div class="header-line">

                <div class="rules">
                    <p>Правила</p>

                    <ul>

                        <li><a href="{{route("post.rules")}}">1. Уважение к другим участникам.</a></li>
                        <li><a href="{{route("post.rules")}}">2. Конфиденциальность и безопасность.</a></li>
                        <li><a href="{{route("post.rules")}}">3. Соблюдение законов.</a></li>
                        <li><a href="{{route("post.rules")}}">4. Запрещенный контент.</a></li>
                        <li><a href="{{route("post.rules")}}">5. Ответственность за контент.</a></li>
                        <li><a href="{{route("post.rules")}}">6. Сотрудничество и поддержка.</a></li>
                        <li><a href="{{route("post.rules")}}">7. Модерация контента.</a></li>



                    </ul>
                </div>



                <div class="post">
                    <div class="polites">
                        <a href="{{route("polites")}}">Политика конфиденциальности</a>
                    </div>
                </div>
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
</script>

</html>
