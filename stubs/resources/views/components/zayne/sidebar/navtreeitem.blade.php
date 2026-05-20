@php
    $tag = $href !== '' ? 'a' : 'button';
@endphp

<{{ $tag }}
    @if($href !== '') href="{{ $href }}" @endif
    @if($tag === 'button') type="button" @endif
    {{ $attributes->except('class') }}
    class="sidebar-label block w-full text-sm px-2 py-1.5 rounded-(--zayne-radius-field) transition-colors duration-150 cursor-pointer
        {{ $active
            ? 'text-(--zayne-custom-sidebar-item-content-active) bg-(--zayne-custom-sidebar-item-bg-active)'
            : 'text-(--zayne-custom-sidebar-content) hover:text-(--zayne-custom-sidebar-item-content-hover) hover:bg-(--zayne-custom-sidebar-item-bg-hover)'
        }}"
>{{ $slot }}</{{ $tag }}>