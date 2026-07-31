<div
    x-data="zayneTimePicker({
        value: {{ $value ? json_encode($value) : 'null' }},
        showSeconds: {{ $seconds ? 'true' : 'false' }},
        meridiem: {{ $meridiem ? 'true' : 'false' }},
        step: {{ $step }}
    })"
    class="zayne-time-picker"
    style="position: relative; width: 100%;"
    x-on:click.outside="close()"
    {{ $attributes->except(['class', 'style']) }}
>
    {{-- Hidden input for form --}}
    @if($name)
        <input type="hidden" name="{{ $name }}" :value="getValue()">
    @endif

    {{-- Trigger --}}
    <div
        class="zayne-input-wrapper"
        style="
            {{ $style }};
            height: var(--zayne-size-field);
            padding: 0 0.875rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            border-style: solid;
            cursor: pointer;
            box-sizing: border-box;
        "
        @click="@if(!$disabled) toggle() @endif"
        tabindex="0"
        @keydown.enter.prevent="toggle()"
        @keydown.space.prevent="toggle()"
        @keydown.escape="close()"
        role="button"
        :aria-expanded="open"
    >
        {{-- Clock icon --}}
        <span style="flex-shrink:0; display:flex; opacity:0.45;">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                stroke-linecap="round" stroke-linejoin="round"
                style="width:0.9375rem; height:0.9375rem;">
                <circle cx="12" cy="12" r="9"/><path d="M12 6v6l4 2"/>
            </svg>
        </span>

        <span
            style="flex:1; font-size:0.875rem;"
            :style="!getValue() ? 'opacity:0.45;' : ''"
        >
            <span x-text="getValue() || '{{ $placeholder }}'"></span>
        </span>

        @if($clearable)
            <button
                type="button"
                x-show="getValue() !== ''"
                x-cloak
                @click.stop="clear()"
                style="
                    display:flex; align-items:center; justify-content:center;
                    width:1.125rem; height:1.125rem;
                    border:none; background:transparent; cursor:pointer; padding:0;
                    color:inherit; opacity:0.5; flex-shrink:0; transition:opacity 120ms;
                "
                onmouseover="this.style.opacity='1'"
                onmouseout="this.style.opacity='0.5'"
                aria-label="Clear time"
            >
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                    stroke-linecap="round" stroke-linejoin="round"
                    style="width:0.75rem; height:0.75rem;">
                    <path d="m6 6 12 12M18 6 6 18"/>
                </svg>
            </button>
        @endif

        <span
            style="flex-shrink:0; display:flex; opacity:0.4; transition:transform 200ms ease;"
            :style="open ? 'transform:rotate(180deg)' : 'transform:rotate(0)'"
        >
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round"
                style="width:0.875rem; height:0.875rem;">
                <path d="m6 9 6 6 6-6"/>
            </svg>
        </span>
    </div>

    {{-- Time picker panel --}}
    <template x-teleport="body">
        <div
            x-show="open"
            x-cloak
            x-ref="panel"
            x-bind:class="open ? 'zayne-dropdown-enter' : 'zayne-dropdown-leave'"
            style="position:fixed; z-index:var(--zayne-z-dropdown); {{ $panelStyle }}"
        >
            <div style="display:flex; align-items:stretch;">

                {{-- Hours column --}}
                <div class="zayne-time-col" style="display:flex; flex-direction:column; align-items:center; padding:0.375rem;">
                    <button type="button" @click="step('hours', 1)" class="zayne-time-arrow">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width:0.875rem;height:0.875rem;"><path d="m6 15 6-6 6 6"/></svg>
                    </button>
                    <div style="width:3rem; text-align:center; font-size:1.375rem; font-weight:600; font-variant-numeric:tabular-nums; padding:0.375rem 0; cursor:default; color:var(--zayne-color-base-content);" x-text="pad(hours)"></div>
                    <button type="button" @click="step('hours', -1)" class="zayne-time-arrow">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width:0.875rem;height:0.875rem;"><path d="m6 9 6 6 6 6" transform="rotate(180 12 12)"/></svg>
                    </button>
                    <span style="font-size:0.6875rem; font-weight:600; text-transform:uppercase; letter-spacing:0.08em; color:var(--zayne-color-base-content-muted); margin-top:0.125rem;">HH</span>
                </div>

                {{-- Colon --}}
                <div style="display:flex; align-items:center; padding:0 0.125rem; font-size:1.375rem; font-weight:300; color:var(--zayne-color-base-content-muted); user-select:none;">:</div>

                {{-- Minutes column --}}
                <div class="zayne-time-col" style="display:flex; flex-direction:column; align-items:center; padding:0.375rem;">
                    <button type="button" @click="step('minutes', {{ $step }})" class="zayne-time-arrow">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width:0.875rem;height:0.875rem;"><path d="m6 15 6-6 6 6"/></svg>
                    </button>
                    <div style="width:3rem; text-align:center; font-size:1.375rem; font-weight:600; font-variant-numeric:tabular-nums; padding:0.375rem 0; cursor:default; color:var(--zayne-color-base-content);" x-text="pad(minutes)"></div>
                    <button type="button" @click="step('minutes', -{{ $step }})" class="zayne-time-arrow">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width:0.875rem;height:0.875rem;"><path d="m6 9 6 6 6 6" transform="rotate(180 12 12)"/></svg>
                    </button>
                    <span style="font-size:0.6875rem; font-weight:600; text-transform:uppercase; letter-spacing:0.08em; color:var(--zayne-color-base-content-muted); margin-top:0.125rem;">MM</span>
                </div>

                {{-- Seconds column --}}
                @if($seconds)
                    <div style="display:flex; align-items:center; padding:0 0.125rem; font-size:1.375rem; font-weight:300; color:var(--zayne-color-base-content-muted); user-select:none;">:</div>
                    <div class="zayne-time-col" style="display:flex; flex-direction:column; align-items:center; padding:0.375rem;">
                        <button type="button" @click="step('seconds', 1)" class="zayne-time-arrow">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width:0.875rem;height:0.875rem;"><path d="m6 15 6-6 6 6"/></svg>
                        </button>
                        <div style="width:3rem; text-align:center; font-size:1.375rem; font-weight:600; font-variant-numeric:tabular-nums; padding:0.375rem 0; cursor:default; color:var(--zayne-color-base-content);" x-text="pad(seconds)"></div>
                        <button type="button" @click="step('seconds', -1)" class="zayne-time-arrow">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width:0.875rem;height:0.875rem;"><path d="m6 9 6 6 6 6" transform="rotate(180 12 12)"/></svg>
                        </button>
                        <span style="font-size:0.6875rem; font-weight:600; text-transform:uppercase; letter-spacing:0.08em; color:var(--zayne-color-base-content-muted); margin-top:0.125rem;">SS</span>
                    </div>
                @endif

                {{-- AM/PM toggle --}}
                @if($meridiem)
                    <div style="display:flex; flex-direction:column; gap:0.25rem; padding:0.5rem 0.375rem; border-left:1px solid var(--zayne-color-base-border); margin-left:0.375rem; justify-content:center;">
                        <button
                            type="button"
                            @click="period = 'AM'"
                            style="padding:0.375rem 0.625rem; border-radius:var(--zayne-radius-selector); border:none; font-family:inherit; font-size:0.8125rem; font-weight:600; cursor:pointer; transition:background 100ms;"
                            :style="period === 'AM' ? 'background:var(--zayne-color-primary); color:var(--zayne-color-primary-content);' : 'background:var(--zayne-color-base-200); color:var(--zayne-color-base-content);'"
                        >AM</button>
                        <button
                            type="button"
                            @click="period = 'PM'"
                            style="padding:0.375rem 0.625rem; border-radius:var(--zayne-radius-selector); border:none; font-family:inherit; font-size:0.8125rem; font-weight:600; cursor:pointer; transition:background 100ms;"
                            :style="period === 'PM' ? 'background:var(--zayne-color-primary); color:var(--zayne-color-primary-content);' : 'background:var(--zayne-color-base-200); color:var(--zayne-color-base-content);'"
                        >PM</button>
                    </div>
                @endif

            </div>

            {{-- OK button --}}
            <div style="padding:0.5rem 0.75rem; border-top:1px solid var(--zayne-color-base-border); display:flex; justify-content:flex-end; gap:0.5rem;">
                <button
                    type="button"
                    @click="clear()"
                    style="border:none; background:transparent; cursor:pointer; font-size:0.8125rem; font-family:inherit; color:var(--zayne-color-base-content-muted); padding:0.25rem 0.5rem; border-radius:var(--zayne-radius-selector);"
                >Clear</button>
                <button
                    type="button"
                    @click="close()"
                    style="
                        border:none; cursor:pointer; font-size:0.8125rem; font-family:inherit; font-weight:500;
                        color:var(--zayne-color-primary-content); background:var(--zayne-color-primary);
                        padding:0.25rem 0.875rem; border-radius:var(--zayne-radius-selector);
                    "
                >OK</button>
            </div>
        </div>
    </template>
</div>
