@once
<style>
    .zayne-radio {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        cursor: pointer;
        user-select: none;
    }

    .zayne-radio-box {
        position: relative;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: var(--zayne-size-selector);
        height: var(--zayne-size-selector);
        border-radius: 50%;
        border: var(--zayne-border-selector) solid transparent;
        flex-shrink: 0;
        transition: background 120ms ease, border-color 120ms ease;
    }

    .zayne-radio-box input {
        position: absolute;
        inset: 0;
        opacity: 0;
        cursor: pointer;
        width: 100%;
        height: 100%;
        margin: 0;
    }

    .zayne-radio-dot {
        width: 38%;
        height: 38%;
        border-radius: 50%;
        background: currentColor;
        opacity: 0;
        transform: scale(0.4);
        transition: opacity 120ms ease, transform 120ms ease;
        pointer-events: none;
    }

    .zayne-radio-dot.is-on {
        opacity: 1;
        transform: scale(1);
    }
</style>
@endonce

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
