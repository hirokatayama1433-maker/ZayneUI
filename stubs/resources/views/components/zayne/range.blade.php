@props([
    'classes'  => '',
    'label'    => null,
    'disabled' => false,
    'showValue'=> false,
])

<div class="flex flex-col gap-1.5 w-full" x-data="{ val: {{ $attributes->get('value', 50) }} }">

    {{-- Label + current value --}}
    @if ($label || $showValue)
        <div class="flex items-center justify-between">
            @if ($label)
                <span class="text-sm font-medium text-[var(--zayne-color-base-content)]">{{ $label }}</span>
            @endif
            @if ($showValue)
                <span class="text-xs text-[var(--zayne-color-base-content-muted)] tabular-nums" x-text="val"></span>
            @endif
        </div>
    @endif

    {{-- Range input --}}
    <input
        type="range"
        x-model="val"
        {{ $attributes->except('class')->merge(['class' => $classes]) }}
        @disabled($disabled)
    />

    {{-- Min / max labels --}}
    @if ($attributes->has('min') || $attributes->has('max'))
        <div class="flex justify-between text-xs text-[var(--zayne-color-base-content-muted)]">
            <span>{{ $attributes->get('min', 0) }}</span>
            <span>{{ $attributes->get('max', 100) }}</span>
        </div>
    @endif

</div>