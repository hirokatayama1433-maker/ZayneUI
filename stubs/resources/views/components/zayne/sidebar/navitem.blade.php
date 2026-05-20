@php
    $tag = $href ? 'a' : 'button';
@endphp

<{{ $tag }}
    @if($href) href="{{ $href }}" @endif
    @if($tag === 'button') type="button" @endif
    {{ $attributes->except('class') }}
    class="h-[38px] flex items-center w-full rounded-(--zayne-radius-field) cursor-pointer transition-colors duration-150
        {{ $active
            ? 'bg-[var(--zayne-custom-sidebar-item-bg-active)] text-[var(--zayne-custom-sidebar-item-content-active)]'
            : 'bg-[var(--zayne-custom-sidebar-item-bg)] text-(--zayne-custom-sidebar-content) hover:bg-[var(--zayne-custom-sidebar-item-bg-hover)] hover:text-[var(--zayne-custom-sidebar-item-content-hover)]'
        }}"
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