@props([
    'classes'   => '',
    'collapsed' => false,
])

<aside {{ $attributes->except('class')->merge(['class' => $classes]) }}>

    {{-- Header / brand --}}
    @isset($header)
        <div class="px-3 py-4 shrink-0">
            {{ $header }}
        </div>
        <x-zayne.layout.divider />
    @endisset

    {{-- Nav items --}}
    <nav class="flex-1 overflow-y-auto px-2 py-3 flex flex-col gap-0.5">
        {{ $slot }}
    </nav>

    {{-- Footer --}}
    @isset($footer)
        <x-zayne.layout.divider />
        <div class="px-3 py-4 shrink-0">
            {{ $footer }}
        </div>
    @endisset

</aside>
