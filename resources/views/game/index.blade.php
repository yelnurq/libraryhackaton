<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Угадай слово</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="{{ asset('css/game-style.css') }}" />
</head>
<body>
    <div class="wrapper">
        <div class="hint-ref"></div>
        <div id="user-input-section"></div>
        <div id="message"></div>
        <div id="letter-container"></div>
    </div>
    <div class="controls-container">
        <div id="result"></div>
        <div id="word"></div>
        <button id="start">Начать</button>
    </div>
    <script src="{{ asset('js/game-script.js') }}"></script>
</body>
</html>
