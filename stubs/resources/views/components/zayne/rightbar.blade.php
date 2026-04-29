@props([
    'classes' => '',
])

<aside {{ $attributes->except('class')->merge([
    'class' => trim('rightbar ' . $classes),
]) }}>
    {{ $slot }}
</aside>
