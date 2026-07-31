@php
    $hasLabel = $label !== null || $slot->isNotEmpty();
    $labelContent = $label ?? ($slot->isNotEmpty() ? $slot : null);
@endphp

<div
    role="separator"
    aria-orientation="{{ $orientation }}"
    class="zayne-separator zayne-separator--{{ $orientation }}"
    style="{{ $style }}"
    {{ $attributes }}
>
    @if(!$hasLabel)
        <span style="{{ $lineStyle }}"></span>
    @elseif($align === 'start')
        <span style="{{ $labelStyle }}">{{ $labelContent }}</span>
        <span style="{{ $lineStyle }}"></span>
    @elseif($align === 'end')
        <span style="{{ $lineStyle }}"></span>
        <span style="{{ $labelStyle }}">{{ $labelContent }}</span>
    @else
        <span style="{{ $lineStyle }}"></span>
        <span style="{{ $labelStyle }}">{{ $labelContent }}</span>
        <span style="{{ $lineStyle }}"></span>
    @endif
</div>
