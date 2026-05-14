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
    @isset($lefticon)
    <div class=" w-[38px] h-[38px] flex justify-center items-center">
        {{ $lefticon }}
    </div>
    @else
    @endif

    <span class="sidebar-label text-sm flex flex-col gap-0">{{ $slot }}</span>

    @isset($righticon)
    <div class=" w-[38px] h-[38px] flex justify-center items-center">
        {{ $righticon }}
    </div>
    @endisset

</{{ $tag }}>