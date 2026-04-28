@props([
    'classes'  => '',
    'disabled' => false,
])

<select
    @disabled($disabled)
    {{ $attributes->except('class')->merge(['class' => $classes]) }}
>
    {{ $slot }}
</select>