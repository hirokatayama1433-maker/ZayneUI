@props([
    'tag'    => 'a',
    'href'   => null,
    'active' => false,
    'classes' => '',
])
@php
    use TailwindMerge\Laravel\Facades\TailwindMerge;
    $finalClasses = TailwindMerge::merge($classes, $attributes->get('class', ''));
@endphp

<{{ $tag }}
    {{ $attributes->except('class') }}
    class="{{ $finalClasses }}"
    @if($href) href="{{ $href }}" @endif
>
    @isset($iconslot)
    <div class="shrink-0 w-[38px] h-[38px] flex justify-center items-center">
        {{ $iconslot }}
    </div>
    @else
    @endif

    <span class="sidebar-label text-sm flex flex-col gap-1">{{ $slot }}</span>

</{{ $tag }}>