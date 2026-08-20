@once
<style>
    .zayne-toggle {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        cursor: pointer;
        user-select: none;
    }

    .zayne-toggle-track {
        position: relative;
        display: inline-flex;
        align-items: center;
        border-radius: 9999px;
        flex-shrink: 0;
        transition: background 150ms ease;
    }

    .zayne-toggle-track input {
        position: absolute;
        inset: 0;
        opacity: 0;
        cursor: pointer;
        width: 100%;
        height: 100%;
        margin: 0;
    }

    .zayne-toggle-thumb {
        position: relative;
        border-radius: 50%;
        background: currentColor;
        transition: transform 180ms cubic-bezier(0.4, 0, 0.2, 1), background 150ms ease;
        pointer-events: none;
        flex-shrink: 0;
    }

    .zayne-toggle-thumb.is-on {
        transform: translateX(var(--zayne-toggle-travel, 100%));
    }
</style>
@endonce

<label style="display:inline-flex; align-items:center; gap:0.75rem; cursor:{{ $disabled ? 'not-allowed' : 'pointer' }}; {{ $disabled ? 'opacity:0.5;' : '' }}" {{ $attributes->except('class') }}>
    <span
        class="zayne-toggle-track {{ $checked ? 'is-on' : '' }}"
        style="{{ $trackStyle }}"
        data-inactive-bg="{{ $trackInactiveBg }}"
        data-active-bg="{{ $trackActiveBg }}"
    >
        <input
            type="checkbox"
            style="position:absolute; opacity:0; width:0; height:0; pointer-events:none;"
            @checked($checked)
            {{ $disabled ? 'disabled' : '' }}
            {{ $attributes->only(['name', 'id', 'value']) }}
            onchange="
                const track = this.parentElement;
                const thumb = track.querySelector('.zayne-toggle-thumb');
                const on = this.checked;
                track.classList.toggle('is-on', on);
                thumb.classList.toggle('is-on', on);
                track.style.background = on ? track.dataset.activeBg : track.dataset.inactiveBg;
            "
        >
        <span
            class="zayne-toggle-thumb {{ $checked ? 'is-on' : '' }}"
            style="{{ $thumbStyle }}"
        ></span>
    </span>
    @if($slot->isNotEmpty())
        <span style="font-size:0.875rem; color:var(--zayne-color-base-content);">{{ $slot }}</span>
    @endif
</label>
