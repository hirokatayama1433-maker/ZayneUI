@props([
    'classes' => '',
])

<header {{ $attributes->except('class')->merge([
    'class' => trim('zayneheader ' . $classes),
]) }}>
    {{ $slot }}
</header>
