<div x-data="zayneModal()" class="zayne-modal-root" {{ $attributes->except(['class', 'style']) }}>
    @isset($trigger)
        <div x-on:click="open = true">{{ $trigger }}</div>
    @endisset

    <div
        x-show="open"
        x-cloak
        @if($closeOnOutside)
            x-on:click.self="open = false"
        @endif
        x-bind:class="open ? 'zayne-backdrop-enter' : 'zayne-backdrop-leave'"
        class="zayne-backdrop"
    ></div>

    <div
        x-show="open"
        x-cloak
        x-on:click.stop
        x-bind:class="open ? 'zayne-modal-enter' : 'zayne-modal-leave'"
        class="zayne-modal-panel"
        style="{{ $style }}"
    >
        <div style="display:flex; justify-content:flex-end; margin-bottom:0.75rem;">
            @isset($closeTrigger)
                <div x-on:click="open = false">{{ $closeTrigger }}</div>
            @else
                <button
                    type="button"
                    x-on:click="open = false"
                    aria-label="Close modal"
                    style="
                        display:inline-flex;
                        align-items:center;
                        justify-content:center;
                        width:2rem;
                        height:2rem;
                        border:none;
                        border-radius:var(--zayne-radius-field);
                        background:transparent;
                        color:inherit;
                        cursor:pointer;
                    "
                >
                    ×
                </button>
            @endisset
        </div>

        {{ $slot }}
    </div>
</div>
