<ul>
    @forelse($encounters as $encounter)
        <li>
            <h2>{{ $encounter->title }}</h2>
            <p>{{ $encounter->type }}</p>
            <p>{{ $encounter->status }}</p>
            <p>{{ $encounter->created_at }}</p>
            <p>{{ $encounter->owner->full_name }}</p>
        </li>
    @empty
        <li>There are no encounters for this patient.</li>
    @endforelse
</ul>
