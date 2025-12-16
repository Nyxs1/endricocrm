@props(['title' => null])

<div {{ $attributes->merge(['class' => 'bg-white overflow-hidden shadow-sm sm:rounded-lg']) }}>
    @if($title)
        <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
            <div class="flex items-center">
                @isset($icon)
                    <div class="mr-3">
                        {{ $icon }}
                    </div>
                @endisset
                <h3 class="text-lg font-medium text-gray-900">{{ $title }}</h3>
            </div>
        </div>
    @endif

    <div class="p-6">
        {{ $slot }}
    </div>
</div>