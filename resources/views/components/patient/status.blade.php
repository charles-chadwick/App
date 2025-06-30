@props([
    'status'
])
@php
    use App\Enums\PatientStatus;
    $color = match ($status) {
        PatientStatus::Archived => 'indigo',
        PatientStatus::Active => 'lime',
        PatientStatus::Inactive => 'red',
        PatientStatus::Prospective => 'blue',
        default => 'gray',
    };
@endphp
<x-elements.badge :color="$color">{{ $status }}</x-elements.badge>
