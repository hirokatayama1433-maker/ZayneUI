@props([
    'classes' => '',
])

<div {{ $attributes->except('class')->merge(['class' => $classes]) }}>
    {{ $slot }}
</div>