<span class="zayne-badge zayne-badge--{{ $size }}" style="{{ $style }}" {{ $attributes }}>
    @isset($iconslot)
        <span class="zayne-badge-icon">{{ $iconslot }}</span>
    @endisset

    <span>{{ $slot }}</span>
</span>
