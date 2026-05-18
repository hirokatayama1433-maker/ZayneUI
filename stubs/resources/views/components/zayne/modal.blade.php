<div x-data="zayneModal()" class="zayne-modal-root" {{ $attributes->except(['class', 'style']) }}>
    @isset($trigger)
        <div x-on:click="open = true">{{ $trigger }}</div>
    @endisset

    <div
        x-show="open"
        x-cloak
        x-on:click="open = false"
        x-bind:class="open ? 'zayne-backdrop-enter' : 'zayne-backdrop-leave'"
        class="zayne-backdrop"
    ></div>

    <div
        x-show="open"
        x-cloak
        x-trap="open"
        x-bind:class="open ? 'zayne-modal-enter' : 'zayne-modal-leave'"
        class="zayne-modal-panel"
        style="{{ $style }}"
    >
        {{ $slot }}
    </div>
</div>
