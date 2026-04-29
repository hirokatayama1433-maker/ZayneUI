{{-- resources/views/components/zayne/sidebar/group.blade.php --}}
@props([
    'label'   => '', 
])

<div class="flex flex-col gap-2 px-2 py-1">
    @if($label)
        <span
            title="{{ $label }}"
            class="flex w-full min-w-0 truncate text-[11px] font-medium uppercase tracking-[0.16em] text-[var(--zayne-custom-sidebar-content)]/55 transition-all duration-200 group-data-[sidebar=collapsed]:max-w-[34px] group-data-[sidebar=collapsed]:text-[9px] group-data-[sidebar=collapsed]:tracking-[0.08em]"
        >
            {{ $label }}
        </span>
    @endif

    <div class="flex flex-col">
        {{ $slot }}
    </div>
</div>
