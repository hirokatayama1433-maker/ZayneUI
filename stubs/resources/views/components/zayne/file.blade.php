<input
    class="zayne-input zayne-file"
    style="{{ $style }}"
    type="file"
    @if($accept !== null) accept="{{ $accept }}" @endif
    @if($multiple) multiple @endif
    @disabled($disabled)
    {{ $attributes }}
>
