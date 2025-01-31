<!doctype html>
<html lang="en">

<head>
    <!-- /Yandex.Metrika counter -->
    <meta charset="utf-8" />
    <title>Alex18w</title>
    <link rel="shortcut icon" href="./img/LogoA.JPG">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css2/style3.css" rel="stylesheet" type="text/css" id="theme-opt" />
</head>

<body>

    @foreach ($visitors as $visitor)
        <div class="visitors-table">
            <p>{{ $visitor->id }}</p>
            <p>Адрес: {{ $visitor->ip }}</p>
            <p>Время: {{ $visitor->last_visited_at }}</p>
        </div>        
    @endforeach



</body>