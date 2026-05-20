@php
    $tag = $href ? 'a' : 'button';
@endphp

<{{ $tag }}
    {{ $attributes->except('class') }}
    class="{{ $classes }}"
    @if($href) href="{{ $href }}" @endif
    @if($tag === 'button') type="button" @endif
>
    @isset($lefticon)
        <div class="w-[38px] h-[38px] flex justify-center items-center shrink-0">
            {{ $lefticon }}
        </div>
    @endisset

    <span class="sidebar-label text-sm flex-1 min-w-0 truncate">{{ $slot }}</span>

    @isset($righticon)
        <div class="w-[38px] h-[38px] flex justify-center items-center shrink-0 sidebar-label">
            {{ $righticon }}
        </div>
    @endisset

</{{ $tag }}>