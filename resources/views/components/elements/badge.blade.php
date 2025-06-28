@props([
    "color"
])
<span class="inline-flex items-center rounded-md bg-{{$color}}-100 px-3 py-1 text-xs font-medium text-{{ $color }}-700">{{ $slot }}</span>
