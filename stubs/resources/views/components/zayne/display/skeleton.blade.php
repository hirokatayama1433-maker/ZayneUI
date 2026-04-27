@props([
    'classes' => '',
    'width'   => null,
    'height'  => null,
])

@php
    $style = implode(' ', array_filter([
        $width ? "width: {$width};" : null,
        $height ? "height: {$height};" : null,
    ]));
@endphp

<div
    {{ $attributes->except('class')->merge(['class' => $classes]) }}
    @if ($style) style="{{ $style }}" @endif
    aria-hidden="true"
></div>