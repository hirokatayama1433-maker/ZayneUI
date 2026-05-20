@php
    use TailwindMerge\Laravel\Facades\TailwindMerge;
    $finalClasses = TailwindMerge::merge($classes, $attributes->get('class', ''));
    $tag = $href !== '' ? 'a' : 'button';
@endphp

<{{ $tag }}
    @if($href !== '') href="{{ $href }}" @endif
    @if($tag === 'button') type="button" @endif
    {{ $attributes->except('class') }}
    class="{{ $finalClasses }}"
>{{ $slot }}</{{ $tag }}>