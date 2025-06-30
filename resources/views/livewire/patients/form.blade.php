<form wire:submit.stop="save">
    <x-elements.message />
    <div class="grid grid-cols-3 gap-4">
        <flux:input
            wire:model="first_name"
            label="First Name"
            placeholder="First Name"
        />

        <flux:input
            wire:model="middle_name"
            label="Middle Name"
            placeholder="Middle Name"
        />

        <flux:input
            wire:model="last_name"
            label="Last Name"
            placeholder="Last Name"
        />

        <flux:input
            wire:model="prefix"
            label="Prefix"
            placeholder="Prefix"
        />

        <flux:input
            wire:model="suffix"
            label="Suffix"
            placeholder="Suffix"
        />

        <flux:select
            wire:model="gender"
            label="Gender"
        >
            @foreach($patient_genders as $gender)
                <flux:select.option wire:key="{{ $gender }}">{{ $gender }}</flux:select.option>
            @endforeach
        </flux:select>

        <flux:input
            wire:model="dob"
            label="Date of Birth"
            placeholder="Date of Birth"
        />

        <div class="col-span-2">
            <flux:input
                wire:model="email"
                label="Email"
                placeholder="Email"
            />
        </div>

        <flux:select
            wire:model="status"
            label="Status"
        >
            @foreach($patient_statuses as $status)
                <flux:select.option wire:key="{{ $status }}">{{ $status }}</flux:select.option>
            @endforeach
        </flux:select>
    </div>
    <div class="mt-4 text-center">
        <button
            class="px-4 py-2  text-zinc-900 rounded bg-gray-300"
            type="submit"
            wire:click="save"
        >Save
        </button>
        <button
            @click="close()"
            class="px-4 py-2  text-zinc-900 rounded bg-gray-300"
        >
            Close
        </button>
    </div>
</form>

