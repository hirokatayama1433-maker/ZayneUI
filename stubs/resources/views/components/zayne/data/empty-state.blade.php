@props([
    'classes'     => '',
    'title'       => 'Nothing here yet',
    'description' => null,
])

<div {{ $attributes->except('class')->merge(['class' => $classes]) }}>

    {{-- Icon slot --}}
    @isset($icon)
        <div class="text-[var(--zayne-color-base-content-muted)]">
            {{ $icon }}
        </div>
    @else
        <x-zayne.icon name="information-circle" class="size-12 text-[var(--zayne-color-base-content-muted)] opacity-40" />
    @endisset

    {{-- Text --}}
    <div class="flex flex-col gap-1">
        @if ($title)
            <p class="text-sm font-semibold text-[var(--zayne-color-base-content)]">{{ $title }}</p>
        @endif
        @if ($description)
            <p class="text-sm text-[var(--zayne-color-base-content-muted)] max-w-sm">{{ $description }}</p>
        @endif
    </div>

    {{-- CTA slot --}}
    @if (!$slot->isEmpty())
        <div>{{ $slot }}</div>
    @endif

</div>