@props([
    'classes'   => '',
    'separator' => 'chevron-right',
    'items'     => [], // array of ['label' => '', 'href' => ''] — optional, can use slot instead
])

<nav aria-label="Breadcrumb" {{ $attributes->except('class')->merge(['class' => $classes]) }}>
    <ol class="flex items-center flex-wrap gap-1">

        @if (!empty($items))
            @foreach ($items as $index => $item)
                <li class="flex items-center gap-1">
                    @if (!$loop->last)
                        <a
                            href="{{ $item['href'] ?? '#' }}"
                            class="text-sm text-[var(--zayne-color-base-content-muted)] hover:text-[var(--zayne-color-base-content)] transition-colors"
                        >{{ $item['label'] }}</a>
                        <x-zayne.icon name="{{ $separator }}" class="size-3.5 text-[var(--zayne-color-base-content-muted)] shrink-0" />
                    @else
                        <span class="text-sm font-medium text-[var(--zayne-color-base-content)]" aria-current="page">
                            {{ $item['label'] }}
                        </span>
                    @endif
                </li>
            @endforeach
        @else
            {{-- Manual slot usage --}}
            {{ $slot }}
        @endif

    </ol>
</nav>