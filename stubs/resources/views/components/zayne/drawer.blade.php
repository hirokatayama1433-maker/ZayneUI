<div x-data="zayneDrawer()" class="zayne-drawer-root" {{ $attributes->except(['class', 'style']) }}>
    @isset($trigger)
        <div x-on:click="open = true">{{ $trigger }}</div>
    @endisset

    <template x-teleport="body">
        <div x-show="open" x-cloak style="position:fixed; inset:0; z-index:var(--zayne-z-drawer);">

            {{-- Backdrop --}}
            <div
                x-on:click="open = false"
                x-bind:class="open ? 'zayne-backdrop-enter' : 'zayne-backdrop-leave'"
                style="position:absolute; inset:0; background:rgba(0,0,0,0.5); backdrop-filter:blur(4px); -webkit-backdrop-filter:blur(4px);"
            ></div>

            {{-- Panel --}}
            <div
                x-on:click.stop
                x-bind:class="open ? '{{ $enterClass }}' : '{{ $leaveClass }}'"
                style="position:absolute; z-index:1; {{ $style }}"
            >
                {{ $slot }}
            </div>
        </div>
    </template>
</div>
