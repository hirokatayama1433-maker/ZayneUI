@php($tag = $href !== 'unset' ? 'a' : 'button')

<{{ $tag }}
    class="zayne-button zayne-button--{{ $size }}"
    style="{{ $style }}"
    @if($href !== 'unset') href="{{ $href }}" @else type="button" @endif
    {{ $attributes }}
>
    @isset($iconslot)
        <span class="zayne-button-icon">{{ $iconslot }}</span>
    @endisset

    <span class="zayne-button-label">{{ $slot }}</span>

    @isset($trailing)
        <span class="zayne-button-trailing">{{ $trailing }}</span>
    @endisset
</{{ $tag }}>
