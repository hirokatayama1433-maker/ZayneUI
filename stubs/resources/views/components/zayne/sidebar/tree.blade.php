{{-- resources/views/components/zayne/sidebar/tree.blade.php --}}
{{--
    Usage:
    <x-zayne.sidebar.tree icon="cog-6-tooth" label="Settings" :badge="3">
        <x-slot:items>
            <x-zayne.sidebar.item href="/settings/general" icon="adjustments-horizontal">General</x-zayne.sidebar.item>
            <x-zayne.sidebar.item href="/settings/billing" icon="credit-card">Billing</x-zayne.sidebar.item>
        </x-slot:items>
    </x-zayne.sidebar.tree>
--}}
<div
    class="w-full"
    data-sidebar-tree
    wire:ignore.self
>
    {{-- Trigger — mirrors item.blade.php exactly --}}
    <button
        type="button"
        onclick="
            var t = this.closest('[data-sidebar-tree]');
            var open = t.classList.toggle('open');
            var children = t.querySelector('[data-tree-children]');
            children.style.maxHeight = open ? children.scrollHeight + 'px' : '0';
        "
        @class([
            'flex items-center gap-[9px] h-[34px] px-[10px] my-[2px] rounded-[var(--zayne-radius-field)] w-full group backdrop-blur-xl text-[14px]',
            'bg-[var(--zayne-custom-sidebar-item-bg)]',
            'text-[var(--zayne-custom-sidebar-item-content)]',
            'hover:bg-[var(--zayne-custom-sidebar-item-bg-hover)]',
            'hover:text-[var(--zayne-custom-sidebar-item-content-hover)]',
            'hover:scale-102',
            'transition-all duration-150 cursor-pointer',
            $attributes->get('class'),
        ])
    >
        {{-- Icon --}}
        @if($icon)
            <x-zayne.icon name="{{ $icon }}" class="shrink-0 scale-120" />
        @endif

        {{-- Label --}}
        <span class="truncate opacity-100 flex-1 text-left transition-opacity duration-150">
            @if($label)
                {{ $label }}
            @else
                {{ $slot }}
            @endif
        </span>

        {{-- Badge — hidden when open --}}
        @if($badge)
            <span class="sidebar-tree-badge shrink-0 min-w-[18px] h-[18px] px-1
                rounded-full text-[10px] font-semibold
                flex items-center justify-center
                bg-[var(--zayne-custom-sidebar-item-content)]
                text-[var(--zayne-custom-sidebar)]">
                {{ $badge }}
            </span>
        @endif

        {{-- Chevron --}}
        <svg
            class="sidebar-tree-chevron shrink-0 size-[13px] opacity-50 transition-transform duration-200"
            viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2.5"
            stroke-linecap="round" stroke-linejoin="round"
        >
            <path d="M9 18l6-6-6-6"/>
        </svg>
    </button>

    {{-- Children --}}
    @isset($items)
        <div
            data-tree-children
            style="max-height: 0; overflow: hidden; transition: max-height 200ms ease-out;"
        >
            <div class="
                relative ml-[22px] pl-[12px] flex flex-col py-[2px]
                before:absolute before:left-0 before:top-[4px] before:bottom-[4px]
                before:w-px
                before:bg-[var(--zayne-custom-sidebar-item-content)]
                before:opacity-20 before:rounded-full
            ">
                {{ $items }}
            </div>
        </div>
    @endisset
</div>

<style>
    [data-sidebar-tree].open .sidebar-tree-chevron  { transform: rotate(90deg); }
    [data-sidebar-tree].open .sidebar-tree-badge    { display: none; }
    .sidebar-collapsed [data-sidebar-tree] [data-tree-children] { max-height: 0 !important; }
    .sidebar-collapsed .sidebar-tree-chevron        { display: none; }
</style>