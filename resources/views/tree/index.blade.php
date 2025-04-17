<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Дерево</title>
</head>
<body>
    <h1><a href="{{ url('/') }}">Дерево</a></h1>
    <h2>Структура дерева</h2>

    <ul>
        @foreach ($nodes as $node)
            @include('tree.recursive', ['node' => $node])
        @endforeach
    </ul>

    <div>
        <h3>Изменить дерево</h3>

            <form method="POST" action="{{ route('tree.store') }}">
            @csrf
                <label for="title">Добавить узел</label>
                <input type="text" name="title" id="title" required>

                <label for="parent_id">Родитель</label>
                <select name="parent_id" id="parent_id">
                <option value="">Корень</option>
                    @foreach($allNodes as $node)
                        <option value="{{ $node->id }}">{{ $node->title }}</option>
                    @endforeach
                </select>
                <button type="submit">Добавить</button>
            </form>

            <hr>
            <form method="POST" action="{{ route('tree.destroy') }}">
            @csrf
            @method('DELETE')

            <label>Удалить узел</label>
            <select name="node_id" required>
                @foreach ($allNodes as $node)
                    <option value="{{ $node->id }}">{{ $node->title }}</option>
                @endforeach
            </select>
            <button type="submit" onclick="return confirm('Вы точно хотите удалить этот узел?')">Удалить</button>
</form>
</body>
</html>