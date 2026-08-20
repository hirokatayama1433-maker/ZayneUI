@once
<style>
    .zayne-button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-weight: 500;
        cursor: pointer;
        border: none;
        text-decoration: none;
        flex-shrink: 0;
        transition: filter 150ms ease, transform 100ms ease, box-shadow 150ms ease;
        white-space: nowrap;
        border-style: solid;
        border-width: 0;
        box-sizing: border-box;
    }
    .zayne-button:focus-visible {
        outline: 2px solid currentColor;
        outline-offset: 2px;
    }
    .zayne-button:not([disabled]):hover {
        filter: brightness(1.08);
    }
    .zayne-button:not([disabled]):active {
        transform: translateY(1px);
        filter: brightness(0.95);
    }
    .zayne-button[disabled] {
        opacity: 0.5;
        cursor: not-allowed;
        pointer-events: none;
    }
    .zayne-button-icon,
    .zayne-button-label,
    .zayne-button-trailing {
        display: inline-flex;
        align-items: center;
    }
</style>
@endonce

@php
    $tag = $href !== null ? 'a' : 'button';
    $iconTrailing = $iconTrailing ?? $attributes->get('icon:trailing');
    $hasLabel = trim((string) $slot) !== '';
    $hasLeadingIcon = $icon !== null || isset($iconslot);
    $hasTrailingIcon = $iconTrailing !== null || isset($trailing);
    $iconOnly = !$hasLabel && ($hasLeadingIcon || $hasTrailingIcon);
    $iconOnlyStyle = $iconOnly ? 'padding:0; min-width:0; aspect-ratio:1/1;' : '';
@endphp

<{{ $tag }}
    class="zayne-button"
    style="{{ $style }}{{ $iconOnlyStyle }}"
    @if($href !== null) href="{{ $href }}" @else type="button" @endif
    {{ $attributes->except(['icon', 'icon:trailing']) }}
>
    @if($icon !== null)
        <span class="zayne-button-icon"><zayne:icon name="{{ $icon }}" /></span>
    @elseif(isset($iconslot))
        <span class="zayne-button-icon">{{ $iconslot }}</span>
    @endif

    @if($hasLabel)
        <span class="zayne-button-label">{{ $slot }}</span>
    @endif

    @if($iconTrailing !== null)
        <span class="zayne-button-trailing"><zayne:icon :name="$iconTrailing" /></span>
    @elseif(isset($trailing))
        <span class="zayne-button-trailing">{{ $trailing }}</span>
    @endif
</{{ $tag }}>