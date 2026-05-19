<input
    class="zayne-input"
    style="{{ $style }}"
    type="{{ $type }}"
    @if($value !== null) value="{{ $value }}" @endif
    @if($placeholder !== null) placeholder="{{ $placeholder }}" @endif
    {{ $attributes }}
>
