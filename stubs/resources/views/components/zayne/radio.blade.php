@props([
    'inputClasses',
    'labelClasses',
    'label'        => null,
    'disabled'     => false,
])

<label class="inline-flex items-center gap-2 w-fit">
    <input
        type="radio"
        @disabled($disabled)
        {{ $attributes->except('class')->merge(['class' => $inputClasses]) }}
    />

    @if ($label || !$slot->isEmpty())
        <span class="{{ $labelClasses }}">
            {{ $slot->isEmpty() ? $label : $slot }}
        </span>
    @endif
</label>