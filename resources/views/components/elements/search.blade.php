<div x-data="{ search: '' }" class="bg-white p-2 rounded shadow-sm">
    <form
        class="flex items-stretch gap-2"
        action="{{ url()->current() }}"
        method="GET"
        @submit="$nextTick(() => search = '')"
    >
        <div class="relative flex-1">
            <input
                type="search"
                name="search"
                x-model="search"
                aria-label="Search"
                class="w-full h-full pl-8 pr-8 text-base text-gray-900 placeholder:text-zinc-400 rounded border border-gray-300"
                placeholder="Search"
            >

            <!-- Search icon -->
            <svg
                class="absolute left-2 top-1/2 -translate-y-1/2 w-5 h-5 text-zinc-400 pointer-events-none"
                viewBox="0 0 20 20"
                fill="currentColor"
                aria-hidden="true"
            >
                <path
                    fill-rule="evenodd"
                    d="M9 3.5a5.5 5.5 0 1 0 0 11 5.5 5.5 0 0 0 0-11ZM2 9a7 7 0 1 1 12.452 4.391l3.328 3.329a.75.75 0 1 1-1.06 1.06l-3.329-3.328A7 7 0 0 1 2 9Z"
                    clip-rule="evenodd"
                />
            </svg>

            <!-- Clear button -->
            <button
                type="button"
                x-show="search"
                @click="search = ''"
                class="absolute right-2 top-1/2 -translate-y-1/2 text-zinc-700 text-2xl"
                aria-label="Clear search"
            >
                &times;
            </button>
        </div>

        <button
            type="submit"
            class="px-4 py-2 bg-zinc-700 text-white text-sm rounded border border-zinc-700"
        >
            Submit
        </button>
    </form>
</div>
