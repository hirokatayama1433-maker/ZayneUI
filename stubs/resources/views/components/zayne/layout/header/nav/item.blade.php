@php
    use TailwindMerge\Laravel\Facades\TailwindMerge;
    $finalClasses = TailwindMerge::merge($classes, $attributes->get('class', ''));
    $tag = $href ? 'a' : 'button';
@endphp

<{{ $tag }}
    @if($href) href="{{ $href }}" @endif
    @if($tag === 'button') type="button" @endif
    {{ $attributes->except('class') }}
    class="{{ $finalClasses }}"
>
    @isset($iconslot)
        <span class="shrink-0">{{ $iconslot }}</span>
    @endisset

    <span>{{ $slot }}</span>

    @isset($badge)
        {{ $badge }}
    @endisset

    @isset($trailing)
        <span class="shrink-0 opacity-50">{{ $trailing }}</span>
    @endisset

    {{-- Active underline --}}
    @if($active)
        <span
            class="rounded-full w-5 opacity-50"
            aria-hidden="true"
            style="position: absolute; bottom: 0; left: 50%; right: 50%; height: 2px; border-radius: 9999px; background-color: var(--zayne-color-primary-content);"
        ></span>
    @endif

</{{ $tag }}>           