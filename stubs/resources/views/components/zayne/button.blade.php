@php($tag = $href !== null ? 'a' : 'button')
@php($computedStyle = $style)

<{{ $tag }}
    class="zayne-button zayne-button--{{ $size }}"
    style="{{ $computedStyle }}"
    @if($href !== null) href="{{ $href }}" @else type="button" @endif
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
