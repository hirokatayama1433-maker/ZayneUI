@props([
    'id'           => 'drawer',
    'panelClasses' => '',
    'title'        => null,
    'side'         => 'right',
    'dismissible'  => true,
    'lazy'         => false,   {{-- true = x-if (destroy on close), false = x-show (keep DOM) --}}
])

@php
    $position = match($side) {
        'left'   => 'inset-y-0 left-0 h-full w-80 border-r',
        'top'    => 'inset-x-0 top-0 w-full border-b',
        'bottom' => 'inset-x-0 bottom-0 w-full border-t',
        default  => 'inset-y-0 right-0 h-full w-80 border-l',
    };
    $enterClass = "zayne-drawer-enter-{$side}";
    $leaveClass = "zayne-drawer-leave-{$side}";
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
            }, 180) {{-- match zayne-drawer-leave duration --}}
        }
    }"
    x-on:open-drawer-{{ $id }}.window="show()"
    x-on:close-drawer-{{ $id }}.window="hide()"
    @keydown.escape.window="if (open) hide()"
>
    {{-- Inline trigger --}}
    @isset($trigger)
        <div @click="show()">{{ $trigger }}</div>
    @endisset

    {{-- Backdrop --}}
    <div
        x-show="open"
        :class="closing ? 'zayne-backdrop-leave' : 'zayne-backdrop-enter'"
        class="fixed inset-0 z-40 bg-black/50"
        @if($dismissible) @click="hide()" @endif
        aria-hidden="true"
        style="display:none"
    ></div>

    {{-- Panel --}}
    <div
        x-show="open"
        :class="closing ? '{{ $leaveClass }}' : '{{ $enterClass }}'"
        class="fixed {{ $position }} z-50 flex flex-col bg-[var(--zayne-color-base-100)] border-[var(--zayne-color-base-border)] shadow-xl {{ $panelClasses }}"
        role="dialog"
        aria-modal="true"
        style="display:none"
    >
        {{-- Header --}}
        @if ($title || isset($header))
            <div class="flex items-center justify-between px-5 py-4 h-[50px] shrink-0">
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
            <x-zayne.layout.divider />
        @endif

        {{-- Body --}}
        <div class="flex-1 overflow-y-auto px-5 py-4">
            @if ($lazy)
                {{--
                    LAZY MODE — x-if
                    DOM only exists while open.
                    Use for: user detail panels, nested @livewire(), heavy content.
                    Tradeoff: state resets on close.
                --}}
                <template x-if="open">
                    <div>{{ $slot }}</div>
                </template>
            @else
                {{--
                    EAGER MODE — always in DOM (default)
                    Use for: nav menus, filter panels, forms user is filling out.
                    Tradeoff: content rendered on page load.
                --}}
                {{ $slot }}
            @endif
        </div>

        {{-- Footer --}}
        @isset($footer)
            <x-zayne.layout.divider />
            <div class="flex items-center justify-end gap-2 px-5 py-4 shrink-0">
                {{ $footer }}
            </div>
        @endisset

    </div>
</div>