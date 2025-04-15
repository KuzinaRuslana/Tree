<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Плоский список</title>
</head>
<body>
    <h1>Дерево</h1>
    <h2>Плоский список</h2>

    <ul>
        @foreach ($nodes as $node)
            <li>{{ $node->title }}</li>
        @endforeach
    </ul>
</body>
</html>