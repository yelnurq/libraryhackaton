<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>"Электронная библиотека" - регистрация</title>

        <link rel="stylesheet" href="{{ asset("css/auth.css") }}">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Manrope">

	</head>
    <body>
        <div class="auth">
            <div class="logo" style="margin-top:26px">
                {{-- <a href="/">
                    <img src="{{asset("css/authlogo.svg")}}" alt="logo">
                </a> --}}


            </div>

            <div class="slot">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
