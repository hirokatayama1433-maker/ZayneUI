@props([
    'classes'      => '',
    'mediaClasses' => '',
    'overlay'      => false,
    'src'          => null,
    'alt'          => '',
    'href'         => null,
])

@php $tag = $href ? 'a' : 'div'; @endphp

<{{ $tag }}
    {{ $attributes->except('class')->merge([
        'class' => $classes,
        'href'  => $href,
    ]) }}
>
    {{-- Media: image or custom slot --}}
    @if ($src)
        <img src="{{ $src }}" alt="{{ $alt }}" class="{{ $mediaClasses }}" loading="lazy" />
    @elseif (isset($media))
        {{ $media }}
    @else
        {{-- Placeholder --}}
        <div class="w-full h-full flex items-center justify-center text-[var(--zayne-color-base-content-muted)]">
            <x-zayne.icon name="paper-clip" class="size-8 opacity-30" />
        </div>
    @endif

    {{-- Hover overlay --}}
    @if ($overlay)
        <div class="
            absolute inset-0 flex items-end
            bg-gradient-to-t from-black/60 to-transparent
            opacity-0 group-hover:opacity-100
            transition-opacity duration-200
            p-3
        ">
            <div class="text-white w-full">
                {{ $slot }}
            </div>
        </div>
    @elseif (!$slot->isEmpty())
        {{-- Always-visible caption below image --}}
        <div class="absolute inset-x-0 bottom-0 p-3 bg-[var(--zayne-color-base-100)] border-t border-[var(--zayne-color-base-border)]">
            {{ $slot }}
        </div>
    @endif

</{{ $tag }}>
