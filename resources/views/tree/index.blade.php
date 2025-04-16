<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Дерево</title>
</head>
<body>
    <h1>Дерево</h1>
    <h2>Структура дерева</h2>

    <ul>
        @foreach ($nodes as $node)
            @include('tree.recursive', ['node' => $node])
        @endforeach
    </ul>

    <div>
        <h3>Изменить дерево</h3>
</body>
</html>