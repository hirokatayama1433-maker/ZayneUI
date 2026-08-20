@once
<style>
    .zayne-modal-panel {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 1;
        background: var(--zayne-color-base-100);
        overflow-y: auto;
        box-sizing: border-box;
        max-width: calc(100vw - 2rem);
    }
</style>
@endonce

@once
<script>
    function zayneModal() {
        return {
            open: false,
            show() { this.open = true; },
            hide() { this.open = false; },
        };
    }
    document.addEventListener('alpine:init', () => {
        Alpine.data('zayneModal', zayneModal);
    });
</script>
@endonce

<div
    x-data="zayneModal()"
    class="zayne-modal-root"
    {{ $attributes->except(['class', 'style']) }}
>
    @isset($trigger)
        <div x-on:click="open = true">{{ $trigger }}</div>
    @endisset

    <template x-teleport="body">
        <div
            x-show="open"
            x-cloak
            style="position: fixed; inset: 0; z-index: var(--zayne-z-modal);"
        >
            {{-- Backdrop --}}
            <div
                @if($closeOnOutside) x-on:click="open = false" @endif
                x-bind:class="open ? 'zayne-backdrop-enter' : 'zayne-backdrop-leave'"
                style="position: absolute; inset: 0; background: rgba(0,0,0,0.5); backdrop-filter: blur(4px); -webkit-backdrop-filter: blur(4px);"
            ></div>

            {{-- Panel --}}
            <div
                x-on:click.stop
                x-bind:class="open ? 'zayne-modal-enter' : 'zayne-modal-leave'"
                class="zayne-modal-panel"
                style="{{ $style }}"
            >
                {{ $slot }}
            </div>
        </div>
    </template>
</div>