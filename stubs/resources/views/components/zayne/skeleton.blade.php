@once
<style>
    .zayne-skeleton {
        position: relative;
        overflow: hidden;
        background: var(--zayne-color-base-200);
        border-radius: var(--zayne-radius-selector);
    }

    .zayne-skeleton::after {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(
            90deg,
            transparent 0%,
            color-mix(in oklch, var(--zayne-color-base-content) 6%, transparent) 50%,
            transparent 100%
        );
        animation: zayne-skeleton-shimmer 1.5s infinite;
    }

    @keyframes zayne-skeleton-shimmer {
        0%   { transform: translateX(-100%); }
        100% { transform: translateX(100%); }
    }
</style>
@endonce

@if($variant === 'text' && $lines > 1)
    <div style="display:flex; flex-direction:column; gap:0.5rem; {{ $margin ? 'margin:' . $margin . ';' : '' }}" {{ $attributes }}>
        @for($i = 0; $i < $lines; $i++)
            <span
                class="zayne-skeleton"
                style="{{ $style }}; {{ $i === $lines - 1 ? 'width:75%;' : '' }} margin:0;"
                aria-hidden="true"
            ></span>
        @endfor
    </div>
@else
    <span
        class="zayne-skeleton zayne-skeleton--{{ $variant }}"
        style="{{ $style }}"
        aria-hidden="true"
        {{ $attributes }}
    ></span>
@endif
