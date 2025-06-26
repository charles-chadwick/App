<div class="divide-zinc-100 divide-y gap-y-4">
    @foreach($activities as $activity)
        <div class="py-2">On {{ $activity['date'] }} {{ $activity['full_name'] }} {{ $activity['description'] }} this record.</div>
    @endforeach
</div>
