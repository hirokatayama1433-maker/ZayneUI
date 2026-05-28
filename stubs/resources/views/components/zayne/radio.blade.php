<label class="zayne-radio" {{ $attributes->except(['class', 'style']) }}>
    <span
        class="zayne-radio-box"
        style="{{ $style }}"
        data-unchecked-bg="{{ $uncheckedBackground }}"
        data-unchecked-color="{{ $uncheckedColor }}"
        data-checked-bg="{{ $checkedBackground }}"
        data-checked-color="{{ $checkedColor }}"
    >
        <input
            type="radio"
            @checked($checked)
            @disabled($disabled)
            onchange="
                const box = this.parentElement;
                const dot = box.querySelector('.zayne-radio-dot');
                const on = this.checked;
                box.style.background = on ? box.dataset.checkedBg : box.dataset.uncheckedBg;
                box.style.color = on ? box.dataset.checkedColor : box.dataset.uncheckedColor;
                dot.classList.toggle('is-on', on);
            "
            {{ $attributes->only(['name', 'value', 'id']) }}
        >
        <span class="zayne-radio-dot {{ $checked ? 'is-on' : '' }}"></span>
    </span>
    <span class="zayne-radio-label">{{ $slot }}</span>
</label>
