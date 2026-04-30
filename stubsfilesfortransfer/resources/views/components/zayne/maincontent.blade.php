@props([
    'classes' => '',
])

<section {{ $attributes->except('class')->merge([
    'class' => trim('maincontent ' . $classes),
]) }}>
    {{ $slot }}
</section>
