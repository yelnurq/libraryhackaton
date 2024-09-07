<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>"Электронная библиотека" - регистрация</title>

        <link rel="stylesheet" href="{{ asset("css/auth.css") }}">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Manrope">
        <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&family=Onest:wght@100..900&display=swap" rel="stylesheet">

	</head>
    <body>
        <div class="auth">
            <div class="logo" style="margin-top:26px">
                <a href="/">
                    <img style="width: 210px" src="https://lumina.kz/public/icons/logo.png" alt="logo">
                </a>


            </div>

            <div class="slot">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
