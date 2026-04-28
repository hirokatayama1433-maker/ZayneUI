@props([
    'classes'      => '',
    'panelClasses' => '',
    'title'        => null,
    'position'     => 'bottom-start',
])

@php
    $alignClass = match($position) {
        'bottom-end' => 'right-0 top-full mt-2',
        'top-start'  => 'left-0 bottom-full mb-2',
        'top-end'    => 'right-0 bottom-full mb-2',
        default      => 'left-0 top-full mt-2',
    };
@endphp

<div
    wire:ignore
    x-data="{ open: false }"
    @click.outside="open = false"
    @keydown.escape.window="if (open) open = false"
    class="relative inline-flex {{ $classes }}"
>
    <div @click="open = !open">
        {{ $trigger }}
    </div>

    <div
        x-show="open"
        x-cloak
        x-transition:enter="transition ease-out duration-150"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-100"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="absolute {{ $alignClass }} z-50 w-64 rounded-[var(--zayne-radius-box)] border border-[var(--zayne-color-base-border)] bg-[var(--zayne-color-base-100)] shadow-[var(--zayne-shadow)] p-4 {{ $panelClasses }}"
    >
        @if ($title || isset($header))
            <div class="flex items-center justify-between mb-3">
                @if ($title)
                    <p class="text-sm font-semibold text-[var(--zayne-color-base-content)]">{{ $title }}</p>
                @elseif (isset($header))
                    {{ $header }}
                @endif
                <button type="button" @click="open = false"
                    class="p-1 rounded-[var(--zayne-radius-field)] text-[var(--zayne-color-base-content-muted)] hover:text-[var(--zayne-color-base-content)] hover:bg-[var(--zayne-color-base-hover)] transition-colors">
                    <x-zayne.icon name="x-mark" class="size-4" />
                </button>
            </div>
            <x-zayne.divider class="mb-3" />
        @endif

        <div class="text-sm text-[var(--zayne-color-base-content)]">
            {{ $slot }}
        </div>
    </div>
</div>