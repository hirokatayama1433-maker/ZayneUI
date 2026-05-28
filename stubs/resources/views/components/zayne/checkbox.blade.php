<label class="zayne-checkbox" {{ $attributes->except(['class', 'style']) }}>
    <span
        class="zayne-checkbox-box"
        style="{{ $style }}"
        data-unchecked-bg="{{ $uncheckedBackground }}"
        data-unchecked-color="{{ $uncheckedColor }}"
        data-checked-bg="{{ $checkedBackground }}"
        data-checked-color="{{ $checkedColor }}"
    >
        <input
            type="checkbox"
            @checked($checked)
            @disabled($disabled)
            onchange="
                const box = this.parentElement;
                const svg = box.querySelector('svg');
                const on = this.checked;
                box.style.background = on ? box.dataset.checkedBg : box.dataset.uncheckedBg;
                box.style.color = on ? box.dataset.checkedColor : box.dataset.uncheckedColor;
                svg.classList.toggle('is-on', on);
            "
            {{ $attributes->only(['name', 'value', 'id']) }}
        >
        <svg viewBox="0 0 16 16" aria-hidden="true" class="{{ $checked ? 'is-on' : '' }}">
            <path d="M3 8.5L6.5 12L13 4.5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
    </span>
    <span class="zayne-checkbox-label">{{ $slot }}</span>
</label>
