<x-app-layout>
    <pre class="p-8">
        @if (isset($results))
            @forelse ($results as $item)
                    {{ $item }}
            @empty
                No result (post method)
            @endforelse
        @else
            No result (get method)
        @endif
    </pre>
</x-app-layout>
