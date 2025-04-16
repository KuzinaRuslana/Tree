<li>
    {{ $node->title }}

    @if ($node->children->isNotEmpty())
        <ul>
            @foreach ($node->children as $child)
                @include('tree.recursive', ['node' => $child])
            @endforeach
        </ul>
    @endif
</li>