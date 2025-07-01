@extends("app")
@section("content")
    <x-elements.card>
        <x-slot:content>
            <x-patient.details :patient="$patient" />
        </x-slot:content>
    </x-elements.card>
    <x-elements.card
        header="Encounters"
        class="mt-6"
    >
        <x-slot:content>
            <livewire:encounter-list :patient="$patient" />
        </x-slot:content>
    </x-elements.card>
@endsection
