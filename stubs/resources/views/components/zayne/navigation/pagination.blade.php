@props([
    'classes'     => '',
    'currentPage' => 1,
    'totalPages'  => 1,
    'pageNumbers' => [],
])

@php
$btnBase    = 'inline-flex items-center justify-center h-9 min-w-[36px] px-2 text-sm rounded-[var(--zayne-radius-field)] transition-colors duration-150';
$btnDefault = 'text-[var(--zayne-color-base-content)] hover:bg-[var(--zayne-color-base-hover)]';
$btnActive  = 'bg-[var(--zayne-color-primary)] text-[var(--zayne-color-primary-content)] font-semibold';
$btnDisabled = 'opacity-40 cursor-not-allowed pointer-events-none';
@endphp

<nav aria-label="Pagination" {{ $attributes->except('class')->merge(['class' => $classes]) }}>

    {{-- Prev --}}
    <x-zayne.action.button
        variant="ghost"
        color="base"
        size="sm"
        :square="true"
        :disabled="$currentPage <= 1"
        :href="$currentPage > 1 ? '?page=' . ($currentPage - 1) : null"
        aria-label="Previous page"
    >
        <x-slot:leftIcon>
            <x-zayne.icon name="chevron-left" class="size-4" />
        </x-slot:leftIcon>
    </x-zayne.action.button>

    {{-- Page numbers --}}
    @foreach ($pageNumbers as $page)
        @if ($page === null)
            <span class="{{ $btnBase }} text-[var(--zayne-color-base-content-muted)] cursor-default">…</span>
        @else
            <a
                href="?page={{ $page }}"
                class="{{ $btnBase }} {{ $page === $currentPage ? $btnActive : $btnDefault }}"
                aria-label="Page {{ $page }}"
                @if ($page === $currentPage) aria-current="page" @endif
            >{{ $page }}</a>
        @endif
    @endforeach

    {{-- Next --}}
    <x-zayne.action.button
        variant="ghost"
        color="base"
        size="sm"
        :square="true"
        :disabled="$currentPage >= $totalPages"
        :href="$currentPage < $totalPages ? '?page=' . ($currentPage + 1) : null"
        aria-label="Next page"
    >
        <x-slot:leftIcon>
            <x-zayne.icon name="chevron-right" class="size-4" />
        </x-slot:leftIcon>
    </x-zayne.action.button>

</nav>