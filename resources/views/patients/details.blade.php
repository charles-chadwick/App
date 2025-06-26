@extends("app")
@section("content")
    <x-patient.details :patient="$patient" :show_footer="true" />
@endsection
