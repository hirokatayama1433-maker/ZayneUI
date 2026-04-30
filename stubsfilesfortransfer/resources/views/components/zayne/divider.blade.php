@props([
    'orientation' => 'horizontal',
    'classes'     => '',
    'lineClasses' => 'flex-1 border-t border-[var(--zayne-color-base-border)] border-solid',
    'label'       => null,
    'align'       => 'center',
])

@if ($orientation === 'vertical')

    <span {{ $attributes->merge(['class' => $classes]) }} role="separator" aria-orientation="vertical"></span>

@else

    <div {{ $attributes->merge(['class' => $classes]) }} role="separator" aria-orientation="horizontal">

        @php $hasLabel = $label || !$slot->isEmpty(); @endphp

        {{-- Left line: always show unless align=start with label --}}
        @if (!$hasLabel || $align !== 'start')
            <span class="{{ $lineClasses }}"></span>
        @endif

        {{-- Label --}}
        @if ($hasLabel)
            <span class="shrink-0 whitespace-nowrap px-1">
                {{ $slot->isEmpty() ? $label : $slot }}
            </span>
        @endif

        {{-- Right line: always show unless align=end with label --}}
        @if (!$hasLabel || $align !== 'end')
            <span class="{{ $lineClasses }}"></span>
        @endif

    </div>

@endif