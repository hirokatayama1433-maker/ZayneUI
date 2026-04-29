{{-- resources/views/components/zayne/sidebar/group.blade.php --}}
@props([
    'label'   => '', 
])

<div class="flex flex-col gap-2 px-2 py-1 group-data-[sidebar=collapsed]:items-center group-data-[sidebar=collapsed]:px-0">
    @if($label)
        <span class="flex truncate text-[11px] font-medium uppercase tracking-[0.16em] text-[var(--zayne-custom-sidebar-content)]/55 transition-all duration-200 group-data-[sidebar=collapsed]:h-0 group-data-[sidebar=collapsed]:overflow-hidden group-data-[sidebar=collapsed]:opacity-0">
            {{ $label }}
        </span>
    @endif

    <div class="flex flex-col group-data-[sidebar=collapsed]:items-center">
        {{ $slot }}
    </div>
</div>
