@props([
    'tag',
    'classes',
    'href'     => null,
    'type'     => 'button',
    'disabled' => false,
])
@php
    use TailwindMerge\Laravel\Facades\TailwindMerge;

    // ZayneUI classes already merged in PHP constructor.
    // Here we only merge in any consumer class= override.
    // Everything else in $attributes passes through untouched —
    // wire:model, x-data, @click, hx-post, etc. all just work.
    $finalClasses = TailwindMerge::merge($classes, $attributes->get('class', ''));
@endphp

<{{ $tag }}
    {{ $attributes->except('class') }}
    class="{{ $finalClasses }}"
    @if($href) href="{{ $href }}" @endif
    @if($tag === 'button') type="{{ $type }}" @endif
    @if($disabled) disabled @endif
>
    @isset($leftIcon)
        <span class="flex items-center">{{ $leftIcon }}</span>
    @endisset

    <span>{{ $slot }}</span>

    @isset($rightIcon)
        <span class="flex items-center">{{ $rightIcon }}</span>
    @endisset
</{{ $tag }}>