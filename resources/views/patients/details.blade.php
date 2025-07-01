@extends("app")
@section("content")
    <x-patient.details :patient="$patient" :show_footer="true" />
    <x-elements.card header="Encounters">
        <x-slot:content>
            <livewire:encounter-list :patient="$patient" />
        </x-slot:content>
    </x-elements.card>
@endsection
