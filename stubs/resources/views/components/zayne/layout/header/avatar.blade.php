@php
    use TailwindMerge\Laravel\Facades\TailwindMerge;
    $finalClasses = TailwindMerge::merge($classes, $attributes->get('class', ''));
    $tag = $href ? 'a' : 'button';
    $initials = collect(explode(' ', trim($name)))->map(fn($w) => strtoupper($w[0] ?? ''))->take(2)->join('');
@endphp

<{{ $tag }}
    @if($href) href="{{ $href }}" @endif
    @if($tag === 'button') type="button" @endif
    {{ $attributes->except('class') }}
    class="{{ $finalClasses }}"
>
    {{-- Avatar image --}}
    <div class="shrink-0 w-[38px] h-[38px] flex justify-center items-center">
        @if($src)
            <img
                src="{{ $src }}"
                alt="{{ $alt ?: $name }}"
                class="w-9.5 h-9.5 rounded-(--zayne-radius-field) object-cover"
            />
        @else
            {{-- Fallback initials --}}
            <div class="w-9.5 h-9.5 rounded-(--zayne-radius-field) flex items-center justify-center text-xs font-semibold bg-(--zayne-color-accent) text-white">
                {{ collect(explode(' ', trim($name)))->map(fn($w) => strtoupper($w[0] ?? ''))->take(2)->join('') }}
            </div>
        @endif
    </div>

    {{-- Caret --}}
    @if($caret)
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke-width="2" stroke="currentColor"
            class="size-3 opacity-50">
            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
        </svg>  
    @endif

</{{ $tag }}>