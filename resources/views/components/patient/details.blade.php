<x-elements.card>
    <x-slot:content>
        <div class="flex">
            <img
                src="{{ $patient->avatar}}"
                class="shrink-0 mr-4 w-24 h-24 rounded-xl"
                alt="Bleh"
            />
            <div class="w-full">
                <h2 class="font-extrabold text-zinc-700">{{ $patient->full_name }} - (#{{ $patient->id }})</h2>
                <p class="text-sm mb-1">{{ $patient->dob }} - {{ $patient->status }}</p>
                <p class="text-sm mb-1">{{ $patient->species }} {{ $patient->gender }}</p>
                <p class="text-sm mb-1">{{ $patient->email }}</p>
            </div>
        </div>
    </x-slot:content>

</x-elements.card>
