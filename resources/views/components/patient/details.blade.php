<x-elements.card>
    <x-slot:content>
        <div class="flex">
            <flux:avatar
                src="{{ $patient->avatar}}"
                size="xl"
                class="shrink-0 mr-4"
            />
            <div class="w-full">
                <h2 class="font-extrabold">{{ $patient->full_name }} - (#{{ $patient->id }})</h2>
                <p>{{ $patient->dob }} - {{ $patient->status }}</p>


                <p>{{ $patient->species }} {{ $patient->gender }}</p>
                <p>{{ $patient->email }}</p>
            </div>
        </div>
    </x-slot:content>
    <x-slot:footer>
        <x-elements.modal
            id="my_id"
            title="Hi There"
        >
            <img
                src="{{ $patient->avatar }}"
                alt="bleh"
            >
        </x-elements.modal>
        <x-elements.modal.trigger id="my_id">Bleh</x-elements.modal.trigger>
    </x-slot:footer>
</x-elements.card>
