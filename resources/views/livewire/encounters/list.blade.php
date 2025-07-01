<flux:table :paginate="$encounters">
    <flux:table.columns>
        <flux:table.column
            sortable
            :sorted="$sort_by === 'date_of_service'"
            :direction="$sort_direction"
            wire:click="sort('date_of_service')"
        >Date of Service
        </flux:table.column>
        <flux:table.column
            sortable
            :sorted="$sort_by === 'status'"
            :direction="$sort_direction"
            wire:click="sort('status')"
        >Status
        </flux:table.column>
        <flux:table.column
            sortable
            :sorted="$sort_by === 'title'"
            :direction="$sort_direction"
            wire:click="sort('title')"
        >Title
        </flux:table.column>
        <flux:table.column>Customer</flux:table.column>

    </flux:table.columns>

    <flux:table.rows>
        @foreach ($encounters as $encounter)
            <flux:table.row :key="$encounter->id">
                <flux:table.cell class="flex items-center gap-3">
                    <a href="{{ route('encounters.show', $encounter) }}" title="Open Encounter">
                    {{ $encounter->title }}
                    </a>
                </flux:table.cell>

                <flux:table.cell class="whitespace-nowrap">{{ $encounter->date_of_service }}</flux:table.cell>

                <flux:table.cell>
                    <flux:badge
                        size="sm"
                        :color="$encounter->status_color"
                        inset="top bottom"
                    >{{ $encounter->status }}</flux:badge>
                </flux:table.cell>

                <flux:table.cell variant="strong">{{ $encounter->owner->full_name }}</flux:table.cell>

                <flux:table.cell>
                    <flux:button
                        variant="ghost"
                        size="sm"
                        icon="ellipsis-horizontal"
                        inset="top bottom"
                    ></flux:button>
                </flux:table.cell>
            </flux:table.row>
        @endforeach
    </flux:table.rows>
</flux:table>
