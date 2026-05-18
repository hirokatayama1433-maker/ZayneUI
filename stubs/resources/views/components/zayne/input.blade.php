<input
    class="zayne-input"
    style="{{ $style }}"
    type="{{ $type }}"
    @if($value !== 'unset') value="{{ $value }}" @endif
    @if($placeholder !== 'unset') placeholder="{{ $placeholder }}" @endif
    {{ $attributes }}
>
