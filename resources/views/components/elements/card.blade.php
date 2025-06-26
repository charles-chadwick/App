@props([
    "header" => null,
    "footer" => null
])
<div class="divide-y divide-gray-200 overflow-hidden rounded-lg bg-white shadow-sm">
    @if ($header != null)
        <div class="px-4 py-5 sm:px-6">
            {{ $header }}
        </div>
    @endif
    <div class="px-4 py-5 sm:p-6">
        {{ $content }}
    </div>
    @if($footer != null)
        <div class="px-4 py-4 sm:px-6 text-sm text-zinc-700">
            {{ $footer }}
        </div>
    @endif
</div>
