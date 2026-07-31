@php($tag = 'h' . $level)

<{{ $tag }} class="zayne-heading" style="{{ $style }}" {{ $attributes }}>{{ $slot }}</{{ $tag }}>
