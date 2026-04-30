{{-- resources/views/components/zayne/sidebar/item.blade.php --}}
<a
    href="{{ $href }}"
    @class([
        'flex items-center gap-[9px] h-[34px] px-[10px] my-[2px] rounded-[var(--zayne-radius-field)] w-full overflow-hidden group backdrop-blur-xl text-[14px]',
        'bg-[var(--zayne-custom-sidebar-item-bg)]',
        'text-[var(--zayne-custom-sidebar-item-content)]',
        'hover:bg-[var(--zayne-custom-sidebar-item-bg-hover)]',
        'hover:text-[var(--zayne-custom-sidebar-item-content-hover)]',
        'data-[active=true]:bg-[var(--zayne-custom-sidebar-item-bg-active)]',
        'data-[active=true]:text-[var(--zayne-custom-sidebar-item-content-active)]',
        'group-data-[sidebar=collapsed]:min-w-[34px] group-data-[sidebar=collapsed]:max-w-[34px] group-data-[sidebar=collapsed]:justify-start group-data-[sidebar=collapsed]:gap-0 group-data-[sidebar=collapsed]:pl-[10px] group-data-[sidebar=collapsed]:pr-0',
        'hover:scale-102',
        'transition-all duration-150',
        $attributes->get('class'),
    ])
    data-active="{{ $isActive() ? 'true' : 'false' }}"
    data-sidebar-item
    {{ $attributes->except('class') }}
>
    {{-- Icon (if provided) --}}
    @if($icon)
        <x-zayne.icon name="{{ $icon }}" class="shrink-0 scale-110 " />
    @endif

    {{-- Text Label --}}
    @if($label)
        <span @class([
            'min-w-0 flex-1 truncate opacity-100 transition-all duration-200 group-data-[sidebar=collapsed]:w-0 group-data-[sidebar=collapsed]:overflow-hidden',
            'group-data-[sidebar=collapsed]:opacity-0' => $hideTextWhenCollapsed,
        ])>
            {{ $label }}
        </span>
    @else
        <span @class([
            'min-w-0 flex-1 truncate opacity-100 transition-all duration-200 group-data-[sidebar=collapsed]:w-0 group-data-[sidebar=collapsed]:overflow-hidden',
            'group-data-[sidebar=collapsed]:opacity-0' => $hideTextWhenCollapsed,
        ])>
            {{ $slot }}
        </span>
    @endif
</a>
