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
            <li>
                {{ $node->title }}
                @if ($node->children->count())
                    <ul>
                        @foreach ($node->children as $child)
                            <li>
                                {{ $child->title }}
                                @if ($child->children->count())
                                    <ul>
                                        @foreach ($child->children as $grandchild)
                                            <li>{{ $grandchild->title }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach
    </ul>
</body>
</html>