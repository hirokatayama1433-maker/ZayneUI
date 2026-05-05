@php
    $tag = $href ? 'a' : 'div';
@endphp

<{{ $tag }}
    @if($href) href="{{ $href }}" @endif
    class="flex items-center gap-2.5 shrink-0 text-(--zayne-color-base-content) hover:opacity-80 transition-opacity duration-150"
>
    @if($src)
        <img src="{{ $src }}" alt="{{ $alt ?: $name }}" class="w-7 h-7 object-contain rounded-(--zayne-radius-field)" />
    @else
        <div class="w-7 h-7 rounded-(--zayne-radius-field) flex items-center justify-center text-xs font-bold bg-(--zayne-color-primary) text-(--zayne-color-primary-content)">
            {{ strtoupper($name[0] ?? 'Z') }}
        </div>
    @endif

    @if($name)
        <span class="text-sm font-semibold truncate">{{ $name }}</span>
    @endif

</{{ $tag }}>