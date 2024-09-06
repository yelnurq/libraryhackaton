<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
</head>
<body>
    <h1>Books</h1>
    <ul>
        @foreach ($books as $book)
            <li>
                <a href="{{ asset('storage/' . $book->pdf_file) }}" target="_blank">{{ $book->title }}</a>
            </li>
        @endforeach
    </ul>
</body>
</html>
