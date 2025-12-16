@props(['type' => 'info', 'dismissible' => false])

@php
    $classes = [
        'success' => 'bg-green-50 border border-green-200 text-green-800',
        'error' => 'bg-red-50 border border-red-200 text-red-800',
        'warning' => 'bg-yellow-50 border border-yellow-200 text-yellow-800',
        'info' => 'bg-blue-50 border border-blue-200 text-blue-800',
    ];

    $iconClasses = [
        'success' => 'text-green-400',
        'error' => 'text-red-400',
        'warning' => 'text-yellow-400',
        'info' => 'text-blue-400',
    ];

    $icons = [
        'success' => 'check-circle',
        'error' => 'x-circle',
        'warning' => 'exclamation-triangle',
        'info' => 'information-circle',
    ];
@endphp

<div {{ $attributes->merge(['class' => 'rounded-md p-4 ' . $classes[$type]]) }}>
    <div class="flex">
        <div class="flex-shrink-0">
            <x-icon :name="$icons[$type]" class="h-5 w-5 {{ $iconClasses[$type] }}" />
        </div>
        <div class="ml-3">
            <div class="text-sm">
                {{ $slot }}
            </div>
        </div>
        @if($dismissible)
            <div class="ml-auto pl-3">
                <div class="-mx-1.5 -my-1.5">
                    <button type="button"
                        class="inline-flex rounded-md p-1.5 {{ $iconClasses[$type] }} hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-green-50 focus:ring-green-600"
                        onclick="this.parentElement.parentElement.parentElement.remove()">
                        <span class="sr-only">Dismiss</span>
                        <x-icon name="x" class="h-5 w-5" />
                    </button>
                </div>
            </div>
        @endif
    </div>
</div>