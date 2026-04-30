@props([
    'classes'   => '',
    'hoverable' => true,
    'flush'     => false,
    'divided'   => 'always',
])

<ul {{ $attributes->merge(['class' => $classes]) }} role="list">
    {{ $slot }}
</ul>
