@props([
    'classes' => '',
])

<main {{ $attributes->except('class')->merge([
    'class' => trim('zaynemain ' . $classes),
]) }}>
    {{ $slot }}
</main>
