@once
<style>
    .zayne-menu {
        display: flex;
        flex-direction: column;
    }

    .zayne-menu-label {
        font-size: 0.65rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.06em;
        color: var(--zayne-color-base-content);
        opacity: 0.45;
        padding: 0.25rem 0.5rem 0.25rem 0.625rem;
        white-space: nowrap;
    }
</style>
@endonce

<div
    {{ $attributes->except('class') }}
    class="zayne-menu"
    style="display:flex; flex-direction:column; padding:{{ $padding }}; gap:{{ $gap }};"
>
    @if($label)
        <div class="zayne-menu-label">{{ $label }}</div>
    @endif

    {{ $slot }}
</div>