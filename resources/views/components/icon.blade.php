@props(['name', 'class' => 'w-5 h-5'])

@php
    $iconPath = public_path('icons/' . $name . '.svg');
    $iconContent = file_exists($iconPath) ? file_get_contents($iconPath) : '';
@endphp

@if($iconContent)
    {!! preg_replace('/<svg/', '<svg ' . $attributes->merge(['class' => $class])->toHtml(), $iconContent, 1) !!}
@else
    <div {{ $attributes->merge(['class' => $class . ' bg-gray-300 rounded']) }} title="Icon not found: {{ $name }}"></div>
@endif