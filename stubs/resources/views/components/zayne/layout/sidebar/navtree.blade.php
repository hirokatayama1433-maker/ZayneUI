@php
    use TailwindMerge\Laravel\Facades\TailwindMerge;
    $finalClasses = TailwindMerge::merge($classes, $attributes->get('class', ''));
@endphp

<div class="zaynenavtree flex flex-col">

    <button
        type="button"
        {{ $attributes->except('class') }}
        class="{{ $finalClasses }}"
        onclick="
            const tree = this.closest('.zaynenavtree');
            const items = tree.querySelector('.navtree-items');
            const chevron = tree.querySelector('.navtree-chevron');
            const isOpen = tree.classList.contains('navtree-open');

            if (isOpen) {
                items.style.maxHeight = '0px';
                items.style.opacity = '0';
                chevron.style.transform = 'rotate(0deg)';
                tree.classList.remove('navtree-open');
            } else {
                items.style.maxHeight = items.scrollHeight + 'px';
                items.style.opacity = '1';
                chevron.style.transform = 'rotate(180deg)';
                tree.classList.add('navtree-open');
            }
        "
    >
        @isset($iconslot)
            <div class="shrink-0 w-[38px] h-[38px] flex justify-center items-center">
                {{ $iconslot }}
            </div>
        @endisset

        <span class="sidebar-label text-sm flex-1 text-left">{{ $label }}</span>

        <span class="sidebar-label flex items-center pr-3">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                class="size-3 navtree-chevron"
                style="transition: transform 280ms cubic-bezier(0.4, 0, 0.2, 1); transform: rotate(0deg);">
                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
            </svg>
        </span>
    </button>

    {{-- children --}}
    <div
        class="navtree-items flex flex-col pl-[38px] overflow-hidden"
        style="max-height: 0; opacity: 0; transition: max-height 300ms cubic-bezier(0.4, 0, 0.2, 1), opacity 150ms ease; position: relative;"
    >
        {{-- left accent line --}}
        <span
            aria-hidden="true"
            style="
                position: absolute;
                left: 18px;
                top: 4px;
                bottom: 4px;
                width: 1.5px;
                border-radius: 9999px;
                background-color: color-mix(in srgb, var(--zayne-custom-sidebar-content) 20%, transparent);
            "
        ></span>
    
        {{ $slot }}
    </div>

</div>