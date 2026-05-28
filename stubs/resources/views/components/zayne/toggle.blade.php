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
