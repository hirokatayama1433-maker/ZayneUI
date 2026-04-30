@props([
    'dotClasses'  => '',
    'lineClasses' => '',
    'last'        => false,
    'timestamp'   => null,
])

<li class="relative flex gap-4 pb-6 last:pb-0">

    {{-- Left column: dot + connector line --}}
    <div class="relative flex flex-col items-center">
        {{-- Dot / icon --}}
        <div class="{{ $dotClasses }}">
            @isset($icon)
                {{ $icon }}
            @endisset
        </div>

        {{-- Vertical connector --}}
        @if (!$last)
            <div class="flex-1 w-px bg-[var(--zayne-color-base-border)] mt-1"></div>
        @endif
    </div>

    {{-- Right column: content --}}
    <div class="flex-1 pb-1">
        {{-- Header row: title + timestamp --}}
        @if (isset($title) || $timestamp)
            <div class="flex items-start justify-between gap-4 mb-1">
                @isset($title)
                    <div class="text-sm font-semibold text-[var(--zayne-color-base-content)]">
                        {{ $title }}
                    </div>
                @endisset
                @if ($timestamp)
                    <span class="text-xs text-[var(--zayne-color-base-content-muted)] shrink-0 mt-0.5">{{ $timestamp }}</span>
                @endif
            </div>
        @endif

        {{-- Body --}}
        <div class="text-sm text-[var(--zayne-color-base-content-muted)]">
            {{ $slot }}
        </div>
    </div>

</li>
