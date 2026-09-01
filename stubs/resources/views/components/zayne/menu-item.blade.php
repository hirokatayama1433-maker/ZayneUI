@php
    $tag = $href ? 'a' : 'button';
@endphp

@once
<style>
    .zayne-menu-item {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        width: 100%;
        padding: 0.4rem 0.5rem;
        border-radius: var(--zayne-radius-field);
        border: none;
        background: transparent;
        font-size: 0.875rem;
        font-family: inherit;
        text-decoration: none;
        cursor: pointer;
        box-sizing: border-box;
        text-align: left;
        transition: background 120ms ease, color 120ms ease;
        white-space: nowrap;
    }

    .zayne-menu-item:disabled,
    .zayne-menu-item[data-disabled] {
        opacity: 0.45;
        pointer-events: none;
        cursor: not-allowed;
    }

    .zayne-menu-item-icon {
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 1.25rem;
        height: 1.25rem;
        opacity: 0.75;
    }

    .zayne-menu-item-label {
        flex: 1;
        min-width: 0;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>
@endonce

<{{ $tag }}
    @if($href) href="{{ $href }}" @endif
    @if($tag === 'button') type="button" @endif
    @if($disabled) disabled data-disabled @endif
    {{ $attributes->except('class') }}
    class="zayne-menu-item"
    style="color:{{ $fg }};"
    @unless($disabled)
        onmouseover="this.style.background='{{ $hoverBg }}'; this.style.color='{{ $hoverFg }}';"
        onmouseout="this.style.background='transparent'; this.style.color='{{ $fg }}';"
    @endunless
>
    @if($icon)
        <span class="zayne-menu-item-icon">
            <zayne:icon name="{{ $icon }}" size="15px" />
        </span>
    @endif

    @if($name !== null)
        <span class="zayne-menu-item-label">{{ $name }}</span>
    @elseif($slot->isNotEmpty())
        <span class="zayne-menu-item-label">{{ $slot }}</span>
    @endif

    {{-- Optional right slot (shortcut hint, badge, arrow, etc.) --}}
    @isset($right)
        <span style="flex-shrink:0; opacity:0.5; font-size:0.75rem; display:flex; align-items:center;">
            {{ $right }}
        </span>
    @endisset
</{{ $tag }}>