@props([
    'classes' => '',
])

<aside {{ $attributes->except('class')->merge([
    'class' => trim('subbar ' . $classes),
]) }}>
    {{ $slot }}
</aside>
