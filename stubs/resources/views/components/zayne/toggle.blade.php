@props([
    'trackClasses',
    'thumbClasses',
    'labelClasses',
    'thumbTranslate',
    'label' => null,
    'labelPosition' => 'right',
    'disabled' => false,
])

@php
    $toggleLabel = $slot->isEmpty() ? $label : $slot;
@endphp

<label class="inline-flex items-center gap-2 w-fit @if($disabled) cursor-not-allowed @else cursor-pointer @endif">
    @if ($toggleLabel && $labelPosition === 'left')
        <span class="{{ $labelClasses }}">{{ $toggleLabel }}</span>
    @endif

    <span class="{{ $trackClasses }}">
        <input
            type="checkbox"
            @disabled($disabled)
            {{ $attributes->merge(['class' => 'peer sr-only']) }}
        />
        <span class="{{ $thumbClasses }} {{ $thumbTranslate }} translate-x-0"></span>
    </span>

    @if ($toggleLabel && $labelPosition === 'right')
        <span class="{{ $labelClasses }}">{{ $toggleLabel }}</span>
    @endif
</label>