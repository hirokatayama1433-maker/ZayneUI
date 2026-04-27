@props(['classes' => ''])

<div {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</div>
