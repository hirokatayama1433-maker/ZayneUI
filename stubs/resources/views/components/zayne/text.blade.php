@php
    $resolvedTag = match(true) {
        $as !== 'auto'     => $as,
        $variant === 'code'    => 'code',
        $variant === 'caption' => 'span',
        $variant === 'strong'  => 'strong',
        default                => 'p',
    };
@endphp
@once
<style>
    .zayne-text {
        color: var(--zayne-color-base-content);
        line-height: 1.6;
    }

    .zayne-text--code {
        font-family: ui-monospace, monospace;
        font-size: 0.875em;
        background: var(--zayne-color-base-200);
        padding: 0.125rem 0.375rem;
        border-radius: var(--zayne-radius-selector);
    }
</style>
@endonce

<{{ $resolvedTag }} class="zayne-text zayne-text--{{ $variant }}" style="{{ $style }}" {{ $attributes }}>{{ $slot }}</{{ $resolvedTag }}>
