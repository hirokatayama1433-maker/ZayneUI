<div
    x-data="zayneDatePicker({
        value: {{ $value ? json_encode($value) : 'null' }},
        min: {{ $min ? json_encode($min) : 'null' }},
        max: {{ $max ? json_encode($max) : 'null' }},
        format: {{ json_encode($format) }}
    })"
    class="zayne-date-picker"
    style="position: relative; width: 100%;"
    x-on:click.outside="close()"
    {{ $attributes->except(['class', 'style']) }}
>
    {{-- Hidden input for form --}}
    @if($name)
        <input type="hidden" name="{{ $name }}" :value="value ?? ''">
    @endif

    {{-- Trigger input --}}
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
        :class="open ? 'zayne-date-picker--open' : ''"
        tabindex="0"
        @keydown.enter.prevent="toggle()"
        @keydown.space.prevent="toggle()"
        @keydown.escape="close()"
        role="button"
        :aria-expanded="open"
    >
        {{-- Calendar icon --}}
        <span style="flex-shrink:0; display:flex; opacity:0.45;">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                stroke-linecap="round" stroke-linejoin="round"
                style="width:0.9375rem; height:0.9375rem;">
                <rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/>
            </svg>
        </span>

        <span
            style="flex:1; font-size:0.875rem;"
            :style="!value ? 'opacity:0.45;' : ''"
        >
            <span x-text="value ? formatDisplay(value) : '{{ $placeholder }}'"></span>
        </span>

        {{-- Clear --}}
        @if($clearable)
            <button
                type="button"
                x-show="value !== null"
                x-cloak
                @click.stop="clear()"
                style="
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    width: 1.125rem;
                    height: 1.125rem;
                    border: none;
                    background: transparent;
                    cursor: pointer;
                    padding: 0;
                    color: inherit;
                    opacity: 0.5;
                    flex-shrink: 0;
                    transition: opacity 120ms;
                "
                onmouseover="this.style.opacity='1'"
                onmouseout="this.style.opacity='0.5'"
                aria-label="Clear date"
            >
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                    stroke-linecap="round" stroke-linejoin="round"
                    style="width:0.75rem; height:0.75rem;">
                    <path d="m6 6 12 12M18 6 6 18"/>
                </svg>
            </button>
        @endif

        {{-- Chevron --}}
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

    {{-- Calendar dropdown --}}
    <template x-teleport="body">
        <div
            x-show="open"
            x-cloak
            x-ref="panel"
            x-bind:class="open ? 'zayne-dropdown-enter' : 'zayne-dropdown-leave'"
            style="position:fixed; z-index:var(--zayne-z-dropdown); {{ $panelStyle }}"
        >
            {{-- Month/Year header --}}
            <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:0.625rem;">
                <button
                    type="button"
                    @click="prevMonth()"
                    style="
                        width:1.75rem; height:1.75rem;
                        border:none; background:transparent; cursor:pointer;
                        display:flex; align-items:center; justify-content:center;
                        border-radius:var(--zayne-radius-selector);
                        color:var(--zayne-color-base-content);
                        opacity:0.6; transition:opacity 120ms, background 120ms;
                    "
                    onmouseover="this.style.opacity='1'; this.style.background='var(--zayne-color-base-200)'"
                    onmouseout="this.style.opacity='0.6'; this.style.background='transparent'"
                >
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" style="width:0.875rem;height:0.875rem;">
                        <path d="m15 6-6 6 6 6"/>
                    </svg>
                </button>

                <button
                    type="button"
                    @click="cycleView()"
                    style="
                        border:none; background:transparent; cursor:pointer;
                        font-size:0.9375rem; font-weight:600; font-family:inherit;
                        color:var(--zayne-color-base-content);
                        padding:0.25rem 0.5rem; border-radius:var(--zayne-radius-selector);
                        transition:background 120ms;
                    "
                    onmouseover="this.style.background='var(--zayne-color-base-200)'"
                    onmouseout="this.style.background='transparent'"
                    x-text="viewLabel()"
                ></button>

                <button
                    type="button"
                    @click="nextMonth()"
                    style="
                        width:1.75rem; height:1.75rem;
                        border:none; background:transparent; cursor:pointer;
                        display:flex; align-items:center; justify-content:center;
                        border-radius:var(--zayne-radius-selector);
                        color:var(--zayne-color-base-content);
                        opacity:0.6; transition:opacity 120ms, background 120ms;
                    "
                    onmouseover="this.style.opacity='1'; this.style.background='var(--zayne-color-base-200)'"
                    onmouseout="this.style.opacity='0.6'; this.style.background='transparent'"
                >
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" style="width:0.875rem;height:0.875rem;">
                        <path d="m9 6 6 6-6 6"/>
                    </svg>
                </button>
            </div>

            {{-- Day-of-week headers --}}
            <div x-show="view === 'days'" style="display:grid; grid-template-columns:repeat(7,1fr); gap:2px; margin-bottom:0.25rem;">
                <template x-for="day in weekDays()" :key="day">
                    <div style="text-align:center; font-size:0.7rem; font-weight:600; color:var(--zayne-color-base-content-muted); padding:0.25rem 0; text-transform:uppercase; letter-spacing:0.05em;" x-text="day"></div>
                </template>
            </div>

            {{-- Day grid --}}
            <div x-show="view === 'days'" style="display:grid; grid-template-columns:repeat(7,1fr); gap:2px;">
                <template x-for="day in calendarDays()" :key="day.iso">
                    <button
                        type="button"
                        @click="day.enabled && selectDate(day.iso)"
                        style="
                            display:flex; align-items:center; justify-content:center;
                            height:2rem; border-radius:var(--zayne-radius-selector);
                            border:none; font-family:inherit; font-size:0.8125rem; cursor:pointer;
                            transition:background 100ms ease, color 100ms ease;
                        "
                        :disabled="!day.enabled"
                        :style="dayStyle(day)"
                        :aria-label="day.iso"
                        :aria-selected="value === day.iso"
                    >
                        <span x-text="day.day"></span>
                    </button>
                </template>
            </div>

            {{-- Month picker --}}
            <div x-show="view === 'months'" style="display:grid; grid-template-columns:repeat(3,1fr); gap:0.375rem;">
                <template x-for="(m, i) in monthNames()" :key="i">
                    <button
                        type="button"
                        @click="selectMonth(i)"
                        style="
                            padding:0.5rem; border-radius:var(--zayne-radius-selector);
                            border:none; font-family:inherit; font-size:0.8125rem;
                            cursor:pointer; transition:background 100ms;
                        "
                        :style="viewMonth === i ? 'background:var(--zayne-color-primary); color:var(--zayne-color-primary-content);' : 'background:transparent; color:var(--zayne-color-base-content);'"
                        x-text="m"
                        onmouseover="if(!this.style.background.includes('primary')) this.style.background='var(--zayne-color-base-200)'"
                        onmouseout="if(!this.style.background.includes('primary')) this.style.background='transparent'"
                    ></button>
                </template>
            </div>

            {{-- Year picker --}}
            <div x-show="view === 'years'" style="display:grid; grid-template-columns:repeat(4,1fr); gap:0.375rem; max-height:12rem; overflow-y:auto;">
                <template x-for="yr in yearRange()" :key="yr">
                    <button
                        type="button"
                        @click="selectYear(yr)"
                        style="
                            padding:0.5rem; border-radius:var(--zayne-radius-selector);
                            border:none; font-family:inherit; font-size:0.8125rem;
                            cursor:pointer; transition:background 100ms;
                        "
                        :style="viewYear === yr ? 'background:var(--zayne-color-primary); color:var(--zayne-color-primary-content);' : 'background:transparent; color:var(--zayne-color-base-content);'"
                        x-text="yr"
                        onmouseover="if(!this.style.background.includes('primary')) this.style.background='var(--zayne-color-base-200)'"
                        onmouseout="if(!this.style.background.includes('primary')) this.style.background='transparent'"
                    ></button>
                </template>
            </div>

            {{-- Today button --}}
            <div style="margin-top:0.625rem; padding-top:0.5rem; border-top:1px solid var(--zayne-color-base-border); display:flex; justify-content:center;">
                <button
                    type="button"
                    @click="selectToday()"
                    style="
                        border:none; background:transparent; cursor:pointer;
                        font-size:0.8125rem; font-family:inherit; font-weight:500;
                        color:var(--zayne-color-primary); padding:0.25rem 0.75rem;
                        border-radius:var(--zayne-radius-selector);
                        transition:background 120ms;
                    "
                    onmouseover="this.style.background='color-mix(in oklch, var(--zayne-color-primary) 10%, transparent)'"
                    onmouseout="this.style.background='transparent'"
                >Today</button>
            </div>
        </div>
    </template>
</div>
