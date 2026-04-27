@props([
    'classes' => '',
    'title'   => null,
    'count'   => null,
])

<div {{ $attributes->merge(['class' => $classes]) }}>

    {{-- Column header --}}
    @if ($title || isset($header))
        <div class="flex items-center justify-between px-1">
            @if ($title)
                <div class="flex items-center gap-2">
                    <h3 class="text-sm font-semibold text-[var(--zayne-color-base-content)]">{{ $title }}</h3>
                    @if ($count !== null)
                        <x-zayne.badge variant="soft" color="base" size="xs">{{ $count }}</x-zayne.badge>
                    @endif
                </div>
            @elseif (isset($header))
                {{ $header }}
            @endif

            @isset($action)
                <div>{{ $action }}</div>
            @endisset
        </div>
    @endif

    {{-- Cards --}}
    <div class="flex flex-col gap-2 rounded-[var(--zayne-radius-box)] bg-[var(--zayne-color-base-200)] p-2 min-h-24">
        {{ $slot }}
    </div>

</div>
