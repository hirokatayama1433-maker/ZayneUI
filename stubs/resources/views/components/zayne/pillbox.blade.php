@php
    $tagColors = [
        'primary'   => ['background' => 'color-mix(in oklch, var(--zayne-color-primary) 18%, transparent)',   'color' => 'var(--zayne-color-primary)'],
        'secondary' => ['background' => 'color-mix(in oklch, var(--zayne-color-secondary) 18%, transparent)', 'color' => 'var(--zayne-color-secondary)'],
        'danger'    => ['background' => 'color-mix(in oklch, var(--zayne-color-danger) 18%, transparent)',    'color' => 'var(--zayne-color-danger)'],
        'success'   => ['background' => 'color-mix(in oklch, var(--zayne-color-success) 18%, transparent)',   'color' => 'var(--zayne-color-success)'],
        'base'      => ['background' => 'var(--zayne-color-base-200)', 'color' => 'var(--zayne-color-base-content)'],
    ];
    $resolvedTag = $tagColors[$tagcolor] ?? $tagColors['primary'];
    $tagBg    = $resolvedTag['background'];
    $tagColor = $resolvedTag['color'];

    $sizePadding = ['sm' => '0 0.625rem', 'md' => '0 0.75rem', 'lg' => '0 0.875rem'][$size] ?? '0 0.75rem';
    $sizeHeight  = ['sm' => '2rem', 'md' => '2.5rem', 'lg' => '3rem'][$size] ?? '2.5rem';
    $initialTags = is_array($value) ? json_encode($value) : '[]';
@endphp

<div
    x-data="zaynePillbox({
        tags: {{ $initialTags }},
        max: {{ $max ?? 'null' }},
        disabled: {{ $disabled ? 'true' : 'false' }}
    })"
    class="zayne-pillbox zayne-pillbox--{{ $size }}"
    style="
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 0.375rem;
        min-height: {{ $sizeHeight }};
        padding: 0.375rem {{ $sizePadding }};
        border-style: solid;
        cursor: text;
        box-sizing: border-box;
        {{ $style }}
    "
    @click="$refs.input.focus()"
>
    {{-- Hidden input for form submission --}}
    <template x-for="(tag, i) in tags" :key="i">
        <input type="hidden" name="{{ $name }}[]" :value="tag">
    </template>

    {{-- Rendered pills --}}
    <template x-for="(tag, i) in tags" :key="tag">
        <span
            class="zayne-pillbox-tag"
            style="
                display: inline-flex;
                align-items: center;
                gap: 0.25rem;
                padding: 0 0.5rem;
                height: 1.625rem;
                border-radius: calc(var(--zayne-radius-field) - 2px);
                font-size: 0.8125rem;
                font-weight: 500;
                white-space: nowrap;
                flex-shrink: 0;
                background: {{ $tagBg }};
                color: {{ $tagColor }};
            "
        >
            <span x-text="tag"></span>
            @if(!$disabled)
                <button
                    type="button"
                    @click.stop="removeTag(i)"
                    style="
                        display: inline-flex;
                        align-items: center;
                        justify-content: center;
                        width: 1rem;
                        height: 1rem;
                        border: none;
                        background: transparent;
                        cursor: pointer;
                        padding: 0;
                        color: currentColor;
                        opacity: 0.6;
                        border-radius: 999px;
                        flex-shrink: 0;
                        transition: opacity 120ms ease, background 120ms ease;
                    "
                    onmouseover="this.style.opacity='1'; this.style.background='rgba(0,0,0,0.12)';"
                    onmouseout="this.style.opacity='0.6'; this.style.background='transparent';"
                    :aria-label="`Remove ${tag}`"
                >
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                        stroke-linecap="round" stroke-linejoin="round"
                        style="width:0.625rem; height:0.625rem;">
                        <path d="m6 6 12 12M18 6 6 18"/>
                    </svg>
                </button>
            @endif
        </span>
    </template>

    {{-- Input --}}
    <input
        x-ref="input"
        type="text"
        placeholder="{{ $placeholder }}"
        :placeholder="tags.length > 0 ? '' : '{{ $placeholder }}'"
        class="zayne-pillbox-input"
        style="
            border: none;
            outline: none;
            background: transparent;
            font-size: {{ ['sm' => '0.8125rem', 'md' => '0.875rem', 'lg' => '1rem'][$size] ?? '0.875rem' }};
            font-family: inherit;
            color: inherit;
            min-width: 8rem;
            flex: 1;
            height: 1.75rem;
            padding: 0;
        "
        @if($disabled) disabled @endif
        @keydown.enter.prevent="addTagFromInput($event.target)"
        @keydown.tab="$event.target.value.trim() !== '' && (addTagFromInput($event.target), $event.preventDefault())"
        @keydown.backspace="$event.target.value === '' && removeTag(tags.length - 1)"
        @keydown.comma.prevent="addTagFromInput($event.target)"
        @paste.prevent="handlePaste($event)"
        {{ $attributes->only(['id', 'autocomplete']) }}
    >
</div>
