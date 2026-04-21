@props([
    'classes'   => '',
    'href'      => null,
    'active'    => false,
])

@php $tag = $href ? 'a' : 'li'; @endphp

<{{ $tag }}
    {{ $attributes->except('class')->merge([
        'class' => $classes,
        'href'  => $href,
    ]) }}
>
    {{-- Leading icon/avatar/media --}}
    @isset($leading)
        <div class="shrink-0">{{ $leading }}</div>
    @endisset

    {{-- Main content --}}
    <div class="flex-1 min-w-0">
        {{ $slot }}
    </div>

    {{-- Trailing icon/badge/action --}}
    @isset($trailing)
        <div class="shrink-0 ml-auto">{{ $trailing }}</div>
    @endisset
</{{ $tag }}>
