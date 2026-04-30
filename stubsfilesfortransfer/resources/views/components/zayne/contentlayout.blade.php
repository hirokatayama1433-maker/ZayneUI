@props([
    'classes' => '',
    'collapsed' => false,
])

<div {{ $attributes->except('class')->merge([
    'class' => trim('Contentlayout ' . ($collapsed ? 'subbar-collapsed ' : '') . $classes),
]) }}>
    {{ $slot }}
</div>
