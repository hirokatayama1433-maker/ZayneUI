@props([
    'classes'        => '',
    'collapsed'      => false,
    'collapsedState' => 'visibleicons',
    'shellStyles'    => '',
    'frameStyles'    => '',
])

@php
    $shellInlineStyles = implode('; ', array_filter([
        $shellStyles,
        $attributes->get('style'),
    ]));
@endphp

<aside
    data-sidebar="{{ $state ?? ($collapsed ? 'collapsed' : 'expanded') }}"
    data-collapse-mode="{{ $collapsedState }}"
    {{ $attributes->except(['class', 'style'])->merge([
        'class' => $classes,
        'style' => $shellInlineStyles,
    ]) }}
>
    <div
        class="zaynesidebar-frame flex h-full flex-col overflow-hidden bg-[var(--zayne-custom-sidebar)] text-[var(--zayne-custom-sidebar-content)] transition-all duration-200 {{ $side === 'right' ? 'border-l' : 'border-r' }} border-[var(--zayne-custom-sidebar-content)]/10"
        style="{{ $frameStyles }}"
    >
        @isset($header)
            <div class="px-3 py-4 shrink-0 sidebar-section sidebar-header">
                {{ $header }}
            </div>
            <x-zayne.ui.separator classes="flex items-center px-2 text-[var(--zayne-custom-sidebar-content)]/30" lineClasses="flex-1 border-t border-[var(--zayne-custom-sidebar-content)]/15 border-solid" />
        @endisset

        <nav class="sidebar-section flex flex-1 flex-col gap-1 overflow-y-auto px-2 py-3 scrollbar-hide">
            {{ $slot }}
        </nav>

        @isset($footer)
            <x-zayne.ui.separator classes="flex items-center px-2 text-[var(--zayne-custom-sidebar-content)]/30" lineClasses="flex-1 border-t border-[var(--zayne-custom-sidebar-content)]/15 border-solid" />
            <div class="px-3 py-4 shrink-0 sidebar-section sidebar-footer">
                {{ $footer }}
            </div>
        @endisset
    </div>
</aside>

<style>
    .zaynesidebar[data-sidebar="collapsed"][data-collapse-mode="fullclosed"] {
        padding: 0 !important;
    }
    .zaynesidebar[data-sidebar="collapsed"][data-collapse-mode="fullclosed"] .zaynesidebar-frame {
        border-width: 0 !important;
        border-radius: 0 !important;
    }
    .zaynesidebar[data-sidebar="collapsed"][data-collapse-mode="fullclosed"] .sidebar-section {
        opacity: 0;
        pointer-events: none;
    }
</style>