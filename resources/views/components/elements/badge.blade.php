@props([
    "color"
])
<span class="inline-flex items-center rounded-md bg-{{ $color }}-50 px-2 py-1 text-xs font-medium text-{{ $color }}-700 ring-1 ring-{{ $color }}-700/10 ring-inset">{{ $slot }}</span>
