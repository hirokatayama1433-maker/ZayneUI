@php($tag = $href !== 'unset' ? 'a' : 'div')
<{{ $tag }} class="zayne-sidebar-brand" @if($href !== 'unset') href="{{ $href }}" @endif {{ $attributes }}>
    {{ $name }}
</{{ $tag }}>
