@php($tag = $href !== 'unset' ? 'a' : 'button')
<{{ $tag }}
    class="zayne-navitem zayne-navtreeitem{{ $active ? ' active' : '' }}"
    @if($href !== 'unset') href="{{ $href }}" @else type="button" @endif
    {{ $attributes }}
>
    @isset($iconslot)
        <span class="zayne-icon-wrapper">{{ $iconslot }}</span>
    @endisset

    <span class="sidebar-label">{{ $slot }}</span>

    @isset($trailing)
        <span>{{ $trailing }}</span>
    @endisset
</{{ $tag }}>
