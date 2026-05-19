@php($tag = $href !== null ? 'a' : 'div')
<{{ $tag }} class="zayne-sidebar-brand" @if($href !== null) href="{{ $href }}" @endif {{ $attributes }}>
    {{ $name }}
</{{ $tag }}>
