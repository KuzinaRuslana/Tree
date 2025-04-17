<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Дерево</title>
</head>
<body>
    <h1>Дерево</h1>
    <img src="{{ asset('images/derevo.png') }}" alt="It's derevo time!" height="500" loading="lazy">
    <h2>Выберите действие</h2>
    <p><a href= "{{ route('tree.index') }}">Получить дерево</a></p>
    <p><a href="{{ route('tree.flat') }}">Получить плоский список</a></p>
</body>
</html>