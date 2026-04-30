@props(['classes' => ''])

<div {{ $attributes->merge(['class' => $classes]) }}>

    {{-- Optional top label/badge row --}}
    @isset($tags)
        <div class="flex flex-wrap gap-1">{{ $tags }}</div>
    @endisset

    {{-- Main content --}}
    <div class="flex-1">
        {{ $slot }}
    </div>

    {{-- Optional footer row — assignees, due date, etc. --}}
    @isset($footer)
        <div class="flex items-center justify-between gap-2 pt-1 border-t border-[var(--zayne-color-base-border)] mt-1">
            {{ $footer }}
        </div>
    @endisset

</div>
