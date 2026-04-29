@props([
    'classes'   => '',
    'collapsed' => false,
    'collapsedState' => 'visibleicons',
    'styles' => '',
])

@php
    $inlineStyles = implode('; ', array_filter([
        $styles,
        $attributes->get('style'),
    ]));
@endphp

<aside
    data-sidebar="{{ $state ?? ($collapsed ? 'collapsed' : 'expanded') }}"
    data-collapse-mode="{{ $collapsedState }}"
    {{ $attributes->except(['class', 'style'])->merge([
        'class' => $classes,
        'style' => $inlineStyles,
    ]) }}
>
    {{-- Header / brand --}}
    @isset($header)
        <div class="px-3 py-4 shrink-0 sidebar-section sidebar-header">
            {{ $header }}
        </div>
        <x-zayne.divider classes="flex items-center px-2 text-[var(--zayne-custom-sidebar-content)]/30" lineClasses="flex-1 border-t border-[var(--zayne-custom-sidebar-content)]/15 border-solid" />
    @endisset

    {{-- Nav items --}}
    <nav class="sidebar-section flex flex-1 flex-col gap-1 overflow-y-auto px-2 py-3 scrollbar-hide">
        {{ $slot }}
    </nav>

    {{-- Footer --}}
    @isset($footer)
        <x-zayne.divider classes="flex items-center px-2 text-[var(--zayne-custom-sidebar-content)]/30" lineClasses="flex-1 border-t border-[var(--zayne-custom-sidebar-content)]/15 border-solid" />
        <div class="px-3 py-4 shrink-0 sidebar-section sidebar-footer">
            {{ $footer }}
        </div>
    @endisset

</aside>

<style>
    .zaynesidebar[data-sidebar="collapsed"][data-collapse-mode="fullclosed"] {
        margin: 0 !important;
        padding: 0 !important;
        border-width: 0 !important;
        border-radius: 0 !important;
    }

    .zaynesidebar[data-sidebar="collapsed"][data-collapse-mode="fullclosed"] .sidebar-section {
        opacity: 0;
        pointer-events: none;
    }
</style>
