@extends("app")
@section("content")
<x-elements.search />
        @foreach($patients as $patient)
            <div class="my-4">
                <x-patient.details :patient="$patient" />
            </div>
        @endforeach
        {{ $patients->links() }}

@endsection
