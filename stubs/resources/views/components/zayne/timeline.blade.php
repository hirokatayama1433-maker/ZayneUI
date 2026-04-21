@props(['classes' => ''])

<ol {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</ol>
