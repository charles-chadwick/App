<div>
    <h1>{{ $patient->full_name }} (#{{ $patient->id }})</h1>
    <p>{{ $patient->dob }} - {{ $patient->status }}</p>
    <p>{{ $patient->species }} {{ $patient->gender }}</p>
    <p>{{ $patient->email }}</p>
</div>
