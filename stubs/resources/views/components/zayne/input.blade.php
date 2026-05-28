<input
    class="zayne-input"
    style="{{ $style }}"
    type="{{ $type }}"
    @disabled($disabled)
    @if($value !== null) value="{{ $value }}" @endif
    @if($placeholder !== null) placeholder="{{ $placeholder }}" @endif
    {{ $attributes }}
>
