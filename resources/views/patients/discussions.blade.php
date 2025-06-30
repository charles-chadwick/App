<ul>
    @forelse($discussions as $discussion)
        <li>
            <h2>{{ $discussion->title }}</h2>
            <p>Created {{ $discussion->created_at }}</p>
        </li>
    @empty
        <li>There are no discussions yet.</li>
    @endforelse
</ul>
