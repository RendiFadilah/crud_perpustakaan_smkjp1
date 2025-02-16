<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @isset($title)
            {{ $title }}
        @else
            Laravel 11
        @endisset
    </title>
</head>
<body>
    <h1>Perpustakaan SMK Jakarta Pusat 1</h1>
    
    <ul class="navbar">
        <li><a href="/">Home</a></li>
        <li><a href="/books">Books</a></li>
    </ul>

    <div class="content">
        {{ $slot }}
    </div>
</body>
</html>