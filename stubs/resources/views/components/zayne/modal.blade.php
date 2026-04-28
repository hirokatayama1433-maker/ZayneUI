@props([
    'id'           => 'modal',
    'panelClasses' => '',
    'title'        => null,
    'size'         => 'md',
    'dismissible'  => true,
    'lazy'         => false,
])

@php
    $sizeClass = match($size) {
        'xs'    => 'max-w-xs',
        'sm'    => 'max-w-sm',
        'lg'    => 'max-w-2xl',
        'xl'    => 'max-w-4xl',
        'full'  => 'max-w-full mx-4',
        default => 'max-w-lg',
    };
@endphp

<div
    wire:ignore
    x-data="{
        open: false,
        closing: false,
        show() {
            this.closing = false
            this.open = true
        },
        hide() {
            this.closing = true
            setTimeout(() => {
                this.open = false
                this.closing = false
            }, 140) {{-- match zayne-modal-out duration --}}
        }
    }"
    x-on:open-modal-{{ $id }}.window="show()"
    x-on:close-modal-{{ $id }}.window="hide()"
    @keydown.escape.window="if (open) hide()"
>
    {{-- Inline trigger --}}
    @isset($trigger)
        <div @click="show()">{{ $trigger }}</div>
    @endisset

    {{-- Backdrop --}}
    <div
        x-show="open"
        x-cloak
        :class="closing ? 'zayne-backdrop-leave' : 'zayne-backdrop-enter'"
        class="fixed inset-0 z-40 bg-black/50"
        @if($dismissible) @click="hide()" @endif
        aria-hidden="true"
        style="display:none"
    ></div>

    {{-- Centering wrapper --}}
    <div
        x-show="open"
        x-cloak
        class="fixed inset-0 z-50 flex items-center justify-center p-4 pointer-events-none"
        style="display:none"
    >
        {{-- Panel --}}
        <div
            :class="closing ? 'zayne-modal-leave' : 'zayne-modal-enter'"
            class="relative w-full {{ $sizeClass }} flex flex-col bg-[var(--zayne-color-base-100)] border border-[var(--zayne-color-base-border)] rounded-[var(--zayne-radius-box)] shadow-xl pointer-events-auto max-h-[90vh] {{ $panelClasses }}"
            role="dialog"
            aria-modal="true"
            @click.stop
        >
            {{-- Header --}}
            @if ($title || isset($header))
                <div class="flex items-center justify-between px-5 py-4 shrink-0">
                    @if ($title)
                        <h2 class="text-base font-semibold text-[var(--zayne-color-base-content)]">{{ $title }}</h2>
                    @elseif (isset($header))
                        {{ $header }}
                    @endif
                    @if ($dismissible)
                        <button type="button" @click="hide()"
                            class="p-1.5 rounded-[var(--zayne-radius-field)] text-[var(--zayne-color-base-content-muted)] hover:bg-[var(--zayne-color-base-hover)] hover:text-[var(--zayne-color-base-content)] transition-colors"
                            aria-label="Close">
                            <x-zayne.icon name="x-mark" class="size-4" />
                        </button>
                    @endif
                </div>
                <x-zayne.divider />
            @endif

            {{-- Body --}}
            <div class="flex-1 overflow-y-auto px-5 py-4">
                @if ($lazy)
                    {{--
                        LAZY MODE — x-if
                        DOM only exists while open.
                        Use for: nested @livewire(), tables, charts, heavy content.
                        Tradeoff: state resets on close.
                    --}}
                    <template x-if="open">
                        <div>{{ $slot }}</div>
                    </template>
                @else
                    {{--
                        EAGER MODE — always in DOM (default)
                        Use for: forms user is filling out, simple content, confirmations.
                        Tradeoff: all modal DOM rendered on page load.
                    --}}
                    {{ $slot }}
                @endif
            </div>

            {{-- Footer --}}
            @isset($footer)
                <x-zayne.divider />
                <div class="flex items-center justify-end gap-2 px-5 py-4 shrink-0">
                    {{ $footer }}
                </div>
            @endisset

        </div>
    </div>
</div>
