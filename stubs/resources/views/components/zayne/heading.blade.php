@php($tag = 'h' . $level)
@once
<style>
    .zayne-heading {
        font-weight: 600;
        line-height: 1.25;
        color: var(--zayne-color-base-content);
    }
</style>
@endonce


<{{ $tag }} class="zayne-heading" style="{{ $style }}" {{ $attributes }}>{{ $slot }}</{{ $tag }}>
