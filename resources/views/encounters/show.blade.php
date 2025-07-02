@php use App\Enums\EncounterStatus;

@endphp
@extends('app')
@section('content')

    <x-elements.card>
        <x-slot:content>
            <x-patient.details :patient="$patient" />
        </x-slot:content>
    </x-elements.card>

    <x-elements.card class="mt-6">
        @if($encounter->status->value == EncounterStatus::Unsigned->value)
            <x-slot:content>
                <livewire:encounter-form :encounter="$encounter" />
            </x-slot:content>
        @else
            <x-slot:header>
                <div class="flex">
                    <h2 class="w-1/2 font-bold">{{ $encounter->title }}</h2>
                    <div class="grow text-sm text-right">
                        Created by {{ $encounter->owner->full_name }}<br /> on {{ $encounter->created_at }}
                    </div>
                </div>
            </x-slot:header>
            <x-slot:content>
                {!! $encounter->content !!}
                <form action="{{ route('encounters.unsign', $encounter) }}" method="post">
                    @csrf
                    <div class="text-center">
                    <button type="submit" class="btn-save">Unsign</button>
                    </div>
                </form>
            </x-slot:content>
        @endif
    </x-elements.card>

@endsection
