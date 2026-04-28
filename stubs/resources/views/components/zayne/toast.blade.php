@props([
    'classes'  => '',
    'title'    => null,
    'duration' => '4000',
])

<div
    x-data="{
        show: true,
        init() {
            @if ($duration)
                setTimeout(() => this.show = false, {{ $duration }})
            @endif
        }
    }"
    x-show="show"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 translate-y-2"
    x-transition:enter-end="opacity-100 translate-y-0"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100 translate-y-0"
    x-transition:leave-end="opacity-0 translate-y-2"
    {{ $attributes->merge(['class' => $classes]) }}
>
    @isset($icon)
        <div class="shrink-0 mt-0.5">{{ $icon }}</div>
    @endisset

    <div class="flex-1 min-w-0">
        @if ($title)
            <p class="text-sm font-semibold leading-tight">{{ $title }}</p>
        @endif
        <div class="text-sm opacity-90 leading-relaxed">{{ $slot }}</div>
    </div>

    <button
        type="button"
        class="shrink-0 self-start -mr-1 -mt-1 p-1 rounded-[var(--zayne-radius-field)] opacity-60 hover:opacity-100 transition-opacity"
        @click="show = false"
        aria-label="Dismiss"
    >
        <x-zayne.icon name="x-mark" class="size-4" />
    </button>
</div>