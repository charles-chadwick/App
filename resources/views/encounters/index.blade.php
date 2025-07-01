<ul>
    @forelse($encounters as $encounter)
        <li>
            {{ $encounter->title }}
            {{ $encounter->type }}
            {{ $encounter->status }}
            {{ $encounter->date_of_service }}
            {{ $encounter->owner->full_name }}
            {{ $encounter->patient->full_name }}
        </li>
        @empty
    @endforelse
</ul>
