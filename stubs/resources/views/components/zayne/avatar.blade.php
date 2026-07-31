@php
    $initials = collect(explode(' ', trim($alt ?: $name)))
        ->filter()
        ->map(fn($w) => strtoupper($w[0] ?? ''))
        ->take(2)
        ->join('');
    if ($initials === '') $initials = '?';
@endphp

<div class="zayne-avatar zayne-avatar--{{ $size }}" style="{{ $style }}" {{ $attributes }}>
    @if($src !== null)
        <img src="{{ $src }}" alt="{{ $alt ?: $name }}">
    @else
        <span>{{ $initials }}</span>
    @endif
</div>
