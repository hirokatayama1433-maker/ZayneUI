@props([
    'classes' => '',
])

<kbd {{ $attributes->except('class')->merge(['class' => $classes]) }}>
    {{ $slot }}
</kbd>