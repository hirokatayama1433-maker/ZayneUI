@props([
    'classes'        => '',
    'divided'        => true,
    'paddingClasses' => 'p-4',
])

<div {{ $attributes->except('class')->merge(['class' => $classes]) }}>

    {{-- Header --}}
    @isset($header)
        <div class="{{ $paddingClasses }}">
            {{ $header }}
        </div>
        @if ($divided)
            <x-zayne.divider />
        @endif
    @endisset

    {{-- Body / default slot --}}
    @if (!$slot->isEmpty())
        <div class="{{ $paddingClasses }} flex-1">
            {{ $slot }}
        </div>
    @endif

    {{-- Footer --}}
    @isset($footer)
        @if ($divided)
            <x-zayne.divider />
        @endif
        <div class="{{ $paddingClasses }}">
            {{ $footer }}
        </div>
    @endisset

</div>