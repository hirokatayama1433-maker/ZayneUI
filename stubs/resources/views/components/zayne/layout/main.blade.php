@props([
    'classes' => '',
])

<section {{ $attributes->except('class')->merge([
    'class' => trim('zaynemain ' . $classes),
]) }}>
    {{ $slot }}
</section>