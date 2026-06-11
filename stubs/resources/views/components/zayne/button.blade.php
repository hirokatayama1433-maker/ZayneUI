@php
    $tag = $href !== null ? 'a' : 'button';
    $computedStyle = $style;
    $iconTrailing = $iconTrailing ?? $attributes->get('icon:trailing');
    $hasLabel = trim((string) $slot) !== '';
    $hasLeadingIcon = $icon !== null || isset($iconslot);
    $hasTrailingIcon = $iconTrailing !== null || isset($trailing);
    $iconOnly = ! $hasLabel && ($hasLeadingIcon ^ $hasTrailingIcon);
    $buttonAttributes = $attributes->except('class', 'icon', 'icon:trailing');
@endphp

<{{ $tag }}
    class="zayne-button zayne-button--{{ $size }}{{ $iconOnly ? ' zayne-button--icon-only' : '' }}"
    style="{{ $computedStyle }}"
    @if($href !== null) href="{{ $href }}" @else type="button" @endif
    {{ $buttonAttributes }}
>
    @if($icon !== null)
        <span class="zayne-button-icon">
            <x-zayne.icon :name="$icon" />
        </span>
    @elseif(isset($iconslot))
        <span class="zayne-button-icon">{{ $iconslot }}</span>
    @endif

    @if($hasLabel)
        <span class="zayne-button-label">{{ $slot }}</span>
    @endif

    @if($iconTrailing !== null)
        <span class="zayne-button-trailing">
            <x-zayne.icon :name="$iconTrailing" />
        </span>
    @elseif(isset($trailing))
        <span class="zayne-button-trailing">{{ $trailing }}</span>
    @endif
</{{ $tag }}>
