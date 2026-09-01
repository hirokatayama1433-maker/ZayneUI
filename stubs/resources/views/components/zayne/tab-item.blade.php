<button
    type="button"
    role="tab"
    class="zayne-tab-item {{ $attributes->get('class') }}"
    :class="isActive('{{ $value }}') ? 'is-active' : ''"
    :aria-selected="isActive('{{ $value }}')"
    @disabled($disabled)
    @click="setActive('{{ $value }}')"
    {{ $attributes->except(['class', 'icon']) }}
>@if($icon)<zayne:icon :name="$icon" />@endif{{ $slot }}</button>