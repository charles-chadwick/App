<div>
    @foreach($activities as $activity)
        <p>On {{ $activity['date'] }} {{ $activity['description'] }} this record.</p>
    @endforeach
</div>
