@props([
    'classes' => '',
    'width'   => null,
    'height'  => null,
])

<div
    {{ $attributes->except('class')->merge(['class' => $classes]) }}
    @if ($width) style="width: {{ $width }}; {{ $height ? 'height: ' . $height . ';' : '' }}" @endif
    @if (!$width && $height) style="height: {{ $height }};" @endif
    aria-hidden="true"
></div>