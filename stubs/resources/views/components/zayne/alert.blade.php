@props([
    'classes'     => '',
    'color'       => 'info',
    'title'       => null,
    'dismissible' => false,
])

<div
    {{ $attributes->merge(['class' => $classes]) }}
    @if ($dismissible) x-data="{ show: true }" x-show="show" @endif
>
    @isset($icon)
        <div class="shrink-0 mt-0.5">{{ $icon }}</div>
    @endisset

    <div class="flex-1 flex flex-col gap-1 min-w-0">
        @if ($title)
            <p class="text-sm font-semibold leading-tight">{{ $title }}</p>
        @endif
        <div class="text-sm leading-relaxed opacity-90">{{ $slot }}</div>
    </div>

    @if ($dismissible)
        <button
            type="button"
            class="shrink-0 self-start -mr-1 -mt-1 p-1 rounded-[var(--zayne-radius-field)] opacity-60 hover:opacity-100 transition-opacity"
            @click="show = false"
            aria-label="Dismiss"
        >
            <x-zayne.icon name="x-mark" class="size-4" />
        </button>
    @endif
</div>