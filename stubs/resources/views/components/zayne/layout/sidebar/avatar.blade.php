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

    {{-- Name + email --}}
    <div class="sidebar-label flex flex-col min-w-0 flex-1 text-left pl-1 ">
        <span class="text-sm font-medium leading-tight truncate">
            {{ $name }}
        </span>
        @if($email)
            <span class="text-xs opacity-50 leading-tight truncate">
                {{ $email }}
            </span>
        @endif
    </div>

    {{-- Actions slot or default ellipsis --}}
    <div class="sidebar-label shrink-0 flex items-center pr-2 opacity-40">
        @isset($action)
            {{ $action }}
        @else
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor" class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
            </svg>
        @endisset
    </div>

</{{ $tag }}>