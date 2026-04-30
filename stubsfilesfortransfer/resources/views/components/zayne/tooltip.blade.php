@props([
    'text'       => '',
    'position'   => 'top',
    'classes'    => '',
    'tipClasses' => '',
])

@php
    $positionClass = match($position) {
        'bottom' => 'top-full left-1/2 -translate-x-1/2 mt-2',
        'left'   => 'right-full top-1/2 -translate-y-1/2 mr-2',
        'right'  => 'left-full top-1/2 -translate-y-1/2 ml-2',
        default  => 'bottom-full left-1/2 -translate-x-1/2 mb-2',
    };
@endphp

<div
    wire:ignore
    x-data="{ show: false }"
    @mouseenter="show = true"
    @mouseleave="show = false"
    @focusin="show = true"
    @focusout="show = false"
    class="relative inline-flex {{ $classes }}"
>
    {{ $slot }}

    <div
        x-show="show"
        x-cloak
        :class="show ? 'zayne-tooltip-enter' : 'zayne-tooltip-leave'"
        class="absolute {{ $positionClass }} z-50 w-max max-w-xs px-2.5 py-1.5 text-xs font-medium rounded-[var(--zayne-radius-field)] bg-[var(--zayne-color-base-content)] text-[var(--zayne-color-base-100)] shadow-sm pointer-events-none {{ $tipClasses }}"
        role="tooltip"
        style="display:none"
    >
        @isset($content){{ $content }}@else{{ $text }}@endisset
    </div>
</div>
