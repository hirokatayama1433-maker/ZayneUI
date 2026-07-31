<div
    x-data="zayneAccordion({ multiple: {{ $multiple ? 'true' : 'false' }}, default: '{{ $default ?? '' }}' })"
    class="zayne-accordion zayne-accordion--{{ $variant }}"
    style="{{ $style }}"
    {{ $attributes }}
>
    {{ $slot }}
</div>
