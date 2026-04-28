@props([
    'classes'  => '',
    'rows'     => 4,
    'disabled' => false,
])

<textarea
    rows="{{ $rows }}"
    {{ $attributes->except('class')->merge(['class' => $classes]) }}
    @disabled($disabled)
>{{ $slot }}</textarea>