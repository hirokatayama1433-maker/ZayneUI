@props([
    'classes' => '',
])

<header {{ $attributes->except('class')->merge([
    'class' => trim('header ' . $classes),
]) }}>
    {{ $slot }}
</header>
