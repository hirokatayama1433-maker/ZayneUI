@props([
    'classes' => '',
])

<div {{ $attributes->except('class')->merge([
    'class' => trim('zaynemainlayout ' . $classes),
]) }}>
    {{ $slot }}
</div>
