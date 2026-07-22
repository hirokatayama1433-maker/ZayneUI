<div
    x-show="isActive('{{ $value }}')"
    x-cloak
    role="tabpanel"
    class="zayne-tab-panel"
    style="{{ $style }}"
    {{ $attributes->except(['class', 'style']) }}
>{{ $slot }}</div>