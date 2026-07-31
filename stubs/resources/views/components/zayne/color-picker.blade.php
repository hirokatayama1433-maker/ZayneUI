<div
    x-data="zayneColorPicker({ value: {{ json_encode($value) }} })"
    class="zayne-color-picker"
    style="{{ $style }}"
    {{ $attributes->except(['class', 'style']) }}
>
    {{-- Hidden input for form --}}
    @if($name)
        <input type="hidden" name="{{ $name }}" :value="color">
    @endif

    {{-- Preview + Hex input row --}}
    @if($showhex)
        <div style="display:flex; align-items:center; gap:0.625rem;">
            {{-- Color preview swatch --}}
            <button
                type="button"
                @click="$refs.nativePicker.click()"
                style="
                    width: 2.5rem;
                    height: 2.5rem;
                    border-radius: var(--zayne-radius-field);
                    border: 2px solid var(--zayne-color-base-border);
                    cursor: pointer;
                    flex-shrink: 0;
                    transition: border-color 150ms ease;
                    padding: 0;
                    overflow: hidden;
                    position: relative;
                "
                :style="`background: ${color};`"
                onmouseover="this.style.borderColor='var(--zayne-color-primary)'"
                onmouseout="this.style.borderColor='var(--zayne-color-base-border)'"
                aria-label="Pick color"
            >
                <input
                    type="color"
                    x-ref="nativePicker"
                    :value="color"
                    @input="setColor($event.target.value)"
                    @change="setColor($event.target.value)"
                    tabindex="-1"
                    style="
                        position: absolute;
                        inset: 0;
                        opacity: 0;
                        width: 100%;
                        height: 100%;
                        cursor: pointer;
                        padding: 0;
                        border: none;
                    "
                >
            </button>

            {{-- Hex input --}}
            <div style="
                display: flex;
                align-items: center;
                flex: 1;
                height: 2.5rem;
                border: var(--zayne-border-field) solid var(--zayne-color-base-border);
                border-radius: var(--zayne-radius-field);
                background: var(--zayne-color-base-100);
                padding: 0 0.75rem;
                gap: 0.375rem;
                transition: border-color 150ms ease;
                box-sizing: border-box;
            "
                :style="hexError ? 'border-color: var(--zayne-color-danger);' : ''"
            >
                <span style="color: var(--zayne-color-base-content-muted); font-size: 0.875rem; flex-shrink:0;">#</span>
                <input
                    type="text"
                    :value="hexInput"
                    @input="onHexInput($event.target.value)"
                    @blur="commitHex()"
                    @keydown.enter="commitHex()"
                    maxlength="6"
                    spellcheck="false"
                    style="
                        border: none;
                        outline: none;
                        background: transparent;
                        font-family: 'JetBrains Mono', 'Fira Code', monospace;
                        font-size: 0.875rem;
                        color: var(--zayne-color-base-content);
                        flex: 1;
                        min-width: 0;
                        text-transform: uppercase;
                        letter-spacing: 0.05em;
                    "
                    placeholder="RRGGBB"
                >

                {{-- Copy button --}}
                <button
                    type="button"
                    x-data="{ copied: false }"
                    @click="navigator.clipboard?.writeText(color); copied = true; setTimeout(() => copied = false, 1500)"
                    style="
                        display: flex;
                        align-items: center;
                        border: none;
                        background: transparent;
                        cursor: pointer;
                        padding: 0;
                        color: var(--zayne-color-base-content);
                        opacity: 0.4;
                        flex-shrink: 0;
                        transition: opacity 120ms;
                    "
                    onmouseover="this.style.opacity='0.9'"
                    onmouseout="this.style.opacity='0.4'"
                    aria-label="Copy color"
                >
                    <span x-show="!copied">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                            stroke-linecap="round" stroke-linejoin="round"
                            style="width:0.875rem; height:0.875rem;">
                            <rect x="8" y="2" width="8" height="4" rx="1"/><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/>
                        </svg>
                    </span>
                    <span x-show="copied" style="color:var(--zayne-color-success);">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                            stroke-linecap="round" stroke-linejoin="round"
                            style="width:0.875rem; height:0.875rem;">
                            <path d="m5 13 4 4 10-10"/>
                        </svg>
                    </span>
                </button>
            </div>
        </div>
    @endif

    {{-- Swatch grid --}}
    @if($showswatch)
        <div style="{{ $swatchStyle }}">
            @foreach($resolvedSwatches() as $swatch)
                <button
                    type="button"
                    @click="setColor('{{ $swatch }}')"
                    style="
                        width: 100%;
                        aspect-ratio: 1;
                        border-radius: calc(var(--zayne-radius-field) - 2px);
                        background: {{ $swatch }};
                        border: 2px solid transparent;
                        cursor: pointer;
                        padding: 0;
                        transition: transform 100ms ease, border-color 100ms ease;
                        position: relative;
                    "
                    :style="color.toLowerCase() === '{{ strtolower($swatch) }}' ? 'border-color: var(--zayne-color-primary); transform: scale(1.15);' : ''"
                    onmouseover="this.style.transform = this.style.transform.includes('scale(1.15)') ? 'scale(1.15)' : 'scale(1.1)'"
                    onmouseout="this.style.transform = this.style.borderColor.includes('primary') ? 'scale(1.15)' : 'scale(1)'"
                    :aria-label="`Select color {{ $swatch }}`"
                    :aria-pressed="color.toLowerCase() === '{{ strtolower($swatch) }}'"
                    title="{{ $swatch }}"
                ></button>
            @endforeach
        </div>
    @endif
</div>
