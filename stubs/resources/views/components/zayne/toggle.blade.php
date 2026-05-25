<label style="display:inline-flex; align-items:center; gap:0.75rem; cursor:{{ $disabled ? 'not-allowed' : 'pointer' }}; {{ $disabled ? 'opacity:0.5;' : '' }}" {{ $attributes->except('class') }}>
    <span style="{{ $trackStyle }}" onclick="
        if ({{ $disabled ? 'true' : 'false' }}) return;
        const thumb = this.querySelector('.zayne-thumb');
        const isOn = thumb.dataset.on === '1';
        if (isOn) {
            thumb.style.left = '3px';
            thumb.dataset.on = '0';
            this.style.background = 'var(--zayne-color-base-300)';
        } else {
            thumb.style.left = '23px';
            thumb.dataset.on = '1';
            this.style.background = 'var(--zayne-color-{{ $color }})';
        }
    ">
        <input
            type="checkbox"
            style="position:absolute; opacity:0; width:0; height:0; pointer-events:none;"
            @checked($checked)
            {{ $disabled ? 'disabled' : '' }}
            {{ $attributes->only(['name', 'id', 'value']) }}
        >
        <span
            class="zayne-thumb"
            style="{{ $thumbStyle }}"
            data-on="{{ $checked ? '1' : '0' }}"
        ></span>
    </span>
    @if($slot->isNotEmpty())
        <span style="font-size:0.875rem; color:var(--zayne-color-base-content);">{{ $slot }}</span>
    @endif
</label>