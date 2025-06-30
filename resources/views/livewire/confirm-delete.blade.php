<form wire:submit="delete">
    <p>Are you sure you want to delete this {{ $to_delete }}?</p>
    <p class="font-bold">This action cannot be undone.</p>
    <div class="mt-4 text-center">
        <button
            class="px-4 py-2  text-zinc-900 rounded bg-gray-300"
            type="submit"
        >Delete
        </button>
        <button
            @click="close()"
            class="px-4 py-2  text-zinc-900 rounded bg-gray-300"
        >
            Close
        </button>
    </div>
</form>
