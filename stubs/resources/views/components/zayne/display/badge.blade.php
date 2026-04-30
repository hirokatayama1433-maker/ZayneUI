@props([
    'classes'      => '',
    'dot'          => false,
    'dotColorClass' => '',
    'label'        => null,
])

<span {{ $attributes->merge(['class' => $classes]) }}>

    @if ($dot)
        <span class="inline-block w-1.5 h-1.5 rounded-full {{ $dotColorClass }}"></span>
    @endif

    {{ $slot->isEmpty() ? $label : $slot }}

</span>