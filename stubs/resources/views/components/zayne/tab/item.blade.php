<button
    type="button"
    role="tab"
    class="zayne-tab-item"
    :class="isActive('{{ $value }}') ? 'is-active' : ''"
    :aria-selected="isActive('{{ $value }}')"
    @disabled($disabled)
    @click="setActive('{{ $value }}')"
    {{ $attributes->except('class') }}
>{{ $slot }}</button>