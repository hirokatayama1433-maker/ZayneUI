@php
    $initials = collect(explode(' ', trim($alt ?: $name)))
        ->filter()
        ->map(fn($w) => strtoupper($w[0] ?? ''))
        ->take(2)
        ->join('');
    if ($initials === '') $initials = '?';
@endphp

@once
 <style>
        /* ── Avatar ── */
    .zayne-avatar {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        flex-shrink: 0;
        border-style: solid;
        box-sizing: border-box;
    }

    .zayne-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .zayne-avatar--sm { width: 2rem;   height: 2rem;   font-size: 0.75rem; }
    .zayne-avatar--md { width: 2.5rem; height: 2.5rem; font-size: 0.875rem; }
    .zayne-avatar--lg { width: 3rem;   height: 3rem;   font-size: 1rem; }
    .zayne-avatar--xl { width: 4rem;   height: 4rem;   font-size: 1.25rem; } </style>    
@endonce

<div class="zayne-avatar zayne-avatar--{{ $size }}" style="{{ $style }}" {{ $attributes }}>
    @if($src !== null)
        <img src="{{ $src }}" alt="{{ $alt ?: $name }}">
    @else
        <span>{{ $initials }}</span>
    @endif
</div>
