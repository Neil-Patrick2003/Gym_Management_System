<x-trainer-layout>
    <div>
        <h2>Stats</h2>
        <ul>
            @foreach ($stats as $stat)
                <li>{{ $stat->title }}: {{ $stat->value }}</li>
            @endforeach
        </div>
    </div>
</x-trainer-layout>
