@php
    $resolvedTag = match(true) {
        $as !== 'auto'     => $as,
        $variant === 'code'    => 'code',
        $variant === 'caption' => 'span',
        $variant === 'strong'  => 'strong',
        default                => 'p',
    };
@endphp

<{{ $resolvedTag }} class="zayne-text zayne-text--{{ $variant }}" style="{{ $style }}" {{ $attributes }}>{{ $slot }}</{{ $resolvedTag }}>
