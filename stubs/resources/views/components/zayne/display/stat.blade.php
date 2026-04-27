@props([
    'classes'      => '',
    'label'        => null,
    'value'        => null,
    'change'       => null,
    'trendClasses',
])

<div {{ $attributes->except('class')->merge(['class' => $classes]) }}> 

    {{-- Optional icon slot --}}
    @isset($icon)
        <div class="mb-2">
            {{ $icon }}
        </div>
    @endisset

    {{-- Label --}}
    @if ($label)
        <p class="text-xs font-medium text-[var(--zayne-color-base-content-muted)] uppercase tracking-wide">
            {{ $label }}
        </p>
    @endif

    {{-- Value --}}
    @if ($value)
        <p class="text-3xl font-bold text-[var(--zayne-color-base-content)] leading-tight">
            {{ $value }}
        </p>
    @endif

    {{-- Change / trend --}}
    @if ($change)
        <p class="{{ $trendClasses }}">{{ $change }}</p>
    @endif

    {{-- Optional extra slot content --}}
    @if (!$slot->isEmpty())
        <div class="mt-1 text-sm text-[var(--zayne-color-base-content-muted)]">
            {{ $slot }}
        </div>
    @endif

</div>