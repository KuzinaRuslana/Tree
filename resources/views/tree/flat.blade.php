<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Плоский список</title>
</head>
<body>
    <h1><a href="{{ url('/') }}">Дерево</a></h1>
    <h2>Плоский список</h2>
    
    <div>
        <form method="GET" action="{{ route('tree.flat') }}">
            <select name="node_id" id="node_id">
                <option value="">Выбрать узел</option>
                @foreach($allNodes as $node)
                    <option value="{{ $node->id }}" {{ $selectedNodeId == $node->id ? 'selected' : '' }}>
                        {{ $node->title }}
                    </option>
                @endforeach
            </select>
            <button type="submit">Показать</button>
        </form>
    </div>

    <ul>
        @foreach ($nodes as $node)
            <li>{{ $node->title }}</li>
        @endforeach
    </ul>
</body>
</html>