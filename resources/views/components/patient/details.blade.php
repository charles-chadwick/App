@props([
    "show_footer" => false,
    "show_menu" => false,
    "patient"
])
<x-elements.card>
    <x-slot:content>
        <div class="flex">
            <img
                src="{{ $patient->avatar}}"
                class="shrink-0 mr-4 w-24 h-24 rounded-xl border-zinc-300 border shadow-xs"
                alt="{{ $patient->full_name }} Avatar"
            />
            <div class="w-full">
                <a href="{{ route('patient.details', $patient) }}">
                    <h2 class="font-extrabold">{{ $patient->full_name }} - (#{{ $patient->id }})</h2>
                </a>
                <p class="text-sm mb-1 text-zinc-700">{{ $patient->dob }} -
                    <livewire:patient-status :status="$patient->status" />
                </p>
                <p class="text-sm mb-1 text-zinc-700">{{ $patient->species }} {{ $patient->gender }}</p>
                <p class="text-sm mb-1 text-zinc-700">{{ $patient->email }}</p>
            </div>
            <div>
                <flux:dropdown>
                    <flux:button icon:trailing="chevron-down">Actions</flux:button>
                    <flux:menu>
                        <flux:menu.item icon="pencil-square">
                            <x-elements.modal.trigger id="patient-form-{{ $patient->id }}">
                                Edit Profile
                            </x-elements.modal.trigger>
                        </flux:menu.item>
                        <flux:menu.item icon="trash">
                            <x-elements.modal.trigger id="delete-patient-confirm-{{ $patient->id }}">
                                Delete Profile
                            </x-elements.modal.trigger>
                        </flux:menu.item>
                    </flux:menu>
                </flux:dropdown>
                <x-elements.modal id="patient-form-{{ $patient->id }}">
                    <livewire:patient-form :patient="$patient" />
                </x-elements.modal>
                <x-elements.modal id="delete-patient-confirm-{{ $patient->id }}">
                    <livewire:confirm-delete :object="$patient" />
                </x-elements.modal>
            </div>
        </div>
    </x-slot:content>
    @if($show_footer)
        <x-slot:footer>
            <x-users.activity :object="$patient" />
        </x-slot:footer>
    @endif
</x-elements.card>
