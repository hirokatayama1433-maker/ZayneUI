@php($tag = $href !== 'unset' ? 'a' : 'div')
<{{ $tag }} class="zayne-brand" @if($href !== 'unset') href="{{ $href }}" @endif {{ $attributes }}>
    {{ $name }}
</{{ $tag }}>
