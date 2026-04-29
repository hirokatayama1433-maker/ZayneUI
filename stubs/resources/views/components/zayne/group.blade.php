{{-- resources/views/components/zayne/sidebar/group.blade.php --}}
@props([
    'label'   => '', 
])

<div class="flex flex-col gap-2 px-2 py-1 group-data-[sidebar=collapsed]:px-0">
    @if($label)
        <span class="flex truncate text-[11px] font-medium uppercase tracking-[0.16em] text-[var(--zayne-custom-sidebar-content)]/55 group-data-[sidebar=collapsed]:opacity-0 transition-opacity duration-200">
            {{ $label }}
        </span>
    @endif

    <div class="flex flex-col">
        {{ $slot }}
    </div>
</div>
