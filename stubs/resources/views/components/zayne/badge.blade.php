@once
    <style>
        /* ── Badge ── */
        .zayne-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.25rem;
            font-weight: 500;
            white-space: nowrap;
            border-style: solid;
            border-width: 0;
            box-sizing: border-box;
        }

        .zayne-badge--sm { height: 1.25rem; font-size: 0.7rem;  padding: 0 0.4rem;   border-radius: var(--zayne-radius-selector); }
        .zayne-badge--md { height: 1.5rem;  font-size: 0.75rem; padding: 0 0.5rem;   border-radius: var(--zayne-radius-selector); }
        .zayne-badge--lg { height: 1.75rem; font-size: 0.8rem;  padding: 0 0.625rem; border-radius: var(--zayne-radius-selector); } 
            </style>   
@endonce

<span class="zayne-badge zayne-badge--{{ $size }}" style="{{ $style }}" {{ $attributes }}>
    @isset($iconslot)
        <span class="zayne-badge-icon">{{ $iconslot }}</span>
    @endisset

    <span>{{ $slot }}</span>
</span>
