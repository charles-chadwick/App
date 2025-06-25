@props([
    "header" => null
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
    <div class="px-4 py-4 sm:px-6">
        {{ $footer }}
        <!-- We use less vertical padding on card footers at all sizes than on headers or body sections -->
    </div>
</div>
