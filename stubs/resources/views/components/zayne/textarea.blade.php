<textarea
    class="zayne-input zayne-textarea"
    style="{{ $style }}"
    @if($placeholder !== null) placeholder="{{ $placeholder }}" @endif
    @disabled($disabled)
    rows="{{ $rows }}"
    {{ $attributes }}
>{{ $value ?? trim($slot) }}</textarea>
