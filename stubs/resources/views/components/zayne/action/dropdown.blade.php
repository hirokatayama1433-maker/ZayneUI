@props([
    'classes'     => '',
    'menuClasses' => '',
    'position'    => 'bottom-start',
])

@php
    $alignClass = match($position) {
        'bottom-end' => 'right-0 top-full mt-1',
        'top-start'  => 'left-0 bottom-full mb-1',
        'top-end'    => 'right-0 bottom-full mb-1',
        default      => 'left-0 top-full mt-1',
    };
@endphp

<div
    wire:ignore
    x-data="{
        open: false,
        closing: false,
        toggle() {
            if (this.open) { this.close() } else { this.closing = false; this.open = true }
        },
        close() {
            if (!this.open) return
            this.closing = true
            setTimeout(() => { this.open = false; this.closing = false }, 75)
        }
    }"
    @click.outside="close()"
    @keydown.escape.window="close()"
    class="relative inline-flex {{ $classes }}"
>
    <div @click="toggle()">{{ $trigger }}</div>

    <div
        x-show="open"
        :class="closing ? 'zayne-popover-leave' : 'zayne-popover-enter'"
        class="absolute {{ $alignClass }} z-50 min-w-[10rem] rounded-[var(--zayne-radius-box)] border border-[var(--zayne-color-base-border)] bg-[var(--zayne-color-base-100)] shadow-[var(--zayne-shadow)] py-1 {{ $menuClasses }}"
        role="menu"
        style="display:none"
    >
        {{ $slot }}
    </div>
</div>