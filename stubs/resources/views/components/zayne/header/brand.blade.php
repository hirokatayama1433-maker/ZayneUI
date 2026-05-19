@php($tag = $href !== null ? 'a' : 'div')
<{{ $tag }} class="zayne-brand" @if($href !== null) href="{{ $href }}" @endif {{ $attributes }}>
    {{ $name }}
</{{ $tag }}>
