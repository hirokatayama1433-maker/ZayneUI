@php
    use TailwindMerge\Laravel\Facades\TailwindMerge;
    $finalClasses = TailwindMerge::merge($classes, $attributes->get('class', ''));
@endphp

<button
    type="button"
    onclick="Zayne.Sidebar.toggle()"
    {{ $attributes->except('class') }}
    class="{{ $finalClasses }}"
>
    {{-- Expand icon — shown when collapsed --}}
    <div class="shrink-0 w-[38px] h-[38px] flex justify-center items-center">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke-width="1.5" stroke="currentColor"
            class="size-5 sidebar-toggle-icon-collapsed"
            style="position: absolute; opacity: 0; transition: opacity var(--layout-transition);">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5M3.75 17.25h16.5" />
        </svg>

        {{-- Collapse icon — shown when expanded --}}
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke-width="1.5" stroke="currentColor"
            class="size-5 sidebar-toggle-icon-expanded"
            style="position: absolute; opacity: 1; transition: opacity var(--layout-transition);">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25H12" />
        </svg>
    </div>

    <span class="sidebar-label text-sm">{{ $label }}</span>

</button>