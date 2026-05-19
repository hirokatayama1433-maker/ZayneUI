<div class="zayne-avatar zayne-avatar--{{ $size }}" style="{{ $style }}" {{ $attributes }}>
    @if($src !== null)
        <img src="{{ $src }}" alt="{{ $alt }}">
    @else
        <span>{{ strtoupper(substr($alt, 0, 1)) }}</span>
    @endif
</div>
