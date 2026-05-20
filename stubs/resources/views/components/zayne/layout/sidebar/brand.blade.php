@php
    $tag = $href ? 'a' : 'div';
@endphp

<div class="flex items-center w-full">

    {{-- Brand link/div --}}
    <{{ $tag }}
        @if($href) href="{{ $href }}" @endif
        class="flex items-center flex-1 min-w-0"
    >
        {{-- Logo --}}
        <div class="shrink-0 w-[38px] h-[38px] flex justify-center items-center">
            @if($src)
                <img
                    src="{{ $src }}"
                    alt="{{ $alt ?: $name }}"
                    class="w-9.5 h-9.5 object-contain"
                />
            @else
                {{-- Fallback: first letter box --}}
                <div class="w-9.5 h-9.5 rounded-(--zayne-radius-field) flex items-center justify-center text-sm font-bold bg-(--zayne-color-accent) text-white">
                    {{ strtoupper($name[0] ?? 'Z') }}
                </div>
            @endif
        </div>

        {{-- Name --}}
        <span class="sidebar-label pl-2 text-sm font-semibold truncate">
            {{ $name }}
        </span>

    </{{ $tag }}>

    {{-- Toggle button --}}
    <button
        type="button"
        onclick="Zayne.Sidebar.toggle()"
        class="sidebar-label shrink-0 w-[30px] h-[30px] flex items-center justify-center rounded-(--zayne-radius-field) cursor-pointer transition-colors duration-150 text-(--zayne-custom-sidebar-content) hover:bg-(--zayne-custom-sidebar-item-bg-hover) opacity-40 hover:opacity-100"
    >
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke-width="1.5" stroke="currentColor" class="size-4">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25H12" />
        </svg>
    </button>

</div>