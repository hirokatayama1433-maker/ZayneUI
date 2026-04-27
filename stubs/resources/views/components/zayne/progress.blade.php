@props([
    'trackClasses' => '',
    'barClasses'   => '',
    'value'        => 0,
    'label'        => null,
])

<div class="w-full flex flex-col gap-1">

    {{-- Optional label + percentage --}}
    @if ($label)
        <div class="flex items-center justify-between text-xs text-[var(--zayne-color-base-content-muted)]">
            <span>{{ $label }}</span>
            <span>{{ $value }}%</span>
        </div>
    @endif

    {{-- Track --}}
    <div
        {{ $attributes->except('class')->merge(['class' => $trackClasses]) }}
        role="progressbar"
        aria-valuenow="{{ $value }}"
        aria-valuemin="0"
        aria-valuemax="100"
    >
        {{-- Bar --}}
        <div class="{{ $barClasses }}" style="width: {{ $value }}%"></div>
    </div>

</div>