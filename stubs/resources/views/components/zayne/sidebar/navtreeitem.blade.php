@php
    $tag = $href ? 'a' : 'button';
@endphp

<{{ $tag }}
    @if($href) href="{{ $href }}" @endif
    @if($tag === 'button') type="button" @endif
    class="{{ $classes }}"
>
    <div class="w-[38px] h-[38px] flex justify-center items-center shrink-0">
        {{-- indent spacer, optionally put a dot/icon here --}}
    </div>

    <span class="sidebar-label text-sm flex-1 min-w-0 truncate">{{ $slot }}</span>

</{{ $tag }}>