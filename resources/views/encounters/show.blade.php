@extends('app')
@section('content')

    <x-elements.card>
        <x-slot:content>
            <x-patient.details :patient="$patient" />
        </x-slot:content>
    </x-elements.card>

    <x-elements.card class="mt-6">
        <x-slot:header>
            <h2 class="font-bold">{{ $encounter->title }}</h2>

        </x-slot:header>
        <x-slot:content>
            {!! $encounter->content !!}
        </x-slot:content>
    </x-elements.card>

@endsection
