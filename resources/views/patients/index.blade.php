@extends("app")
@section("content")
    <x-elements.search />

    @forelse($patients as $patient)
        <div class="my-4">
            <x-patient.details :patient="$patient" wire:key="{{ $patient->id }}" />
        </div>
    @empty
        <div class="my-4">
            <p>No results found.</p>
        </div>
    @endforelse
    {{ $patients->links() }}

@endsection
