@php use App\Enums\EncounterStatus; @endphp

<form wire:submit="save">
    <div class="flex gap-x-2">
        <div class="flex-2/3">
            <flux:input
                wire:model="title"
                placeholder="Title"
            />
        </div>
        <div class="grow">
            <flux:input
                wire:model="date_of_service"
                placeholder="Date of service"
            />
        </div>
        <div class="flex-none">
            <flux:select
                wire:model="status"
                variant="listbox"
                placeholder="Choose Status"
            >
                @foreach(EncounterStatus::array() as $name => $value)
                    <flux:select.option value="{{ $name }}">{{ $value }}</flux:select.option>
                @endforeach

            </flux:select>
        </div>
    </div>
    <flux:editor
        wire:model="content"
        class="mt-6"
    />
    <div class="mt-4 text-center">
        <button
            class="btn-save"
            type="submit"
            wire:click="save"
        >Save
        </button>
    </div>
</form>
