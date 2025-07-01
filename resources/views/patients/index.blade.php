@extends("app")
@section("content")
    <x-elements.search />
    @forelse($patients as $patient)
        <div class="my-4">
            <x-elements.card>
                <x-slot:content>
                    <x-patient.details :patient="$patient" />
                </x-slot:content>
            </x-elements.card>
        </div>
    @empty
        <div class="my-4">
            <p>No patients found.</p>
        </div>
    @endforelse
    {{ $patients->links() }}
@endsection
