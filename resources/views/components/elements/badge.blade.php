@props([
    "color"
])
<span class="inline-flex items-center rounded-md bg-{{ $color }}-100 mx-1 px-2 py-1 text-xs font-medium text-{{ $color }}-600 ring-1 ring-{{ $color }}-100/10 ring-inset">{{ $slot }}</span>
