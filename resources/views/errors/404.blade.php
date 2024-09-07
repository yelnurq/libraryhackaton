<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Электронная библиотека - 404</title>
    <link rel="stylesheet" href="{{asset("css/error.css")}}">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Jost">
</head>
<body>
    <div class="main">
        <div class="img">
            <p>💔</p>
        </div>
        <p class="title">Ошибка 404: Страница не найдена</p>
        <p class="desc">К сожалению, запрашиваемая вами страница не найдена. Возможно, она была удалена, перемещена или никогда не существовала.
            <br>Приносим извинения за возможные неудобства. Наши специалисты уже заняты решением этой проблемы. </p>
        <form action="{{route("post.index")}}">
            <button>На главную страницу</button>
        </form>
    </div>
</body>
</html>