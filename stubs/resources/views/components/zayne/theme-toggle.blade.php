@php
    $themeColors = [
        'neutral' => '#737373',
        'red'     => '#ef4444',
        'orange'  => '#f97316',
        'yellow'  => '#eab308',
        'lime'    => '#84cc16',
        'green'   => '#16a34a',
        'teal'    => '#14b8a6',
        'cyan'    => '#06b6d4',
        'sky'     => '#0ea5e9',
        'blue'    => '#3b82f6',
        'violet'  => '#8b5cf6',
        'purple'  => '#a855f7',
        'magenta' => '#d946ef',
        'pink'    => '#ec4899',
    ];

    $themeNames = [];

    foreach ($themeColors as $color => $accent) {
        foreach (['light', 'dark'] as $mode) {
            foreach (['minimalist', 'maximalist'] as $style) {
                $themeNames[] = [
                    'name'   => "zaynetheme-{$color}-{$mode}-{$style}",
                    'color'  => $color,
                    'mode'   => $mode,
                    'style'  => $style,
                    'accent' => $accent,
                ];
            }
        }
    }
@endphp

@once
    <style>
        /* ── Theme Picker ── */

        .zayne-theme-picker {
            display: flex;
            flex-direction: column;
            width: 100%;
            gap: 2px;
        }

        .zayne-theme-picker-item {
            display: flex;
            align-items: center;
            width: 100%;
            min-height: 30px;
            padding: 0.25rem 0.5rem;
            gap: 0.625rem;

            border: 1px solid transparent;
            border-radius: var(--zayne-radius-field);

            background: transparent;
            color: var(--zayne-color-base-content);

            font-size: 0.75rem;
            font-weight: 400;
            line-height: 1;

            text-align: left;
            cursor: pointer;
            appearance: none;

            transition:
                background 120ms ease,
                border-color 120ms ease,
                color 120ms ease;
        }

        .zayne-theme-picker-item:hover {
            background: var(--zayne-color-base-200);
        }

        .zayne-theme-picker-item.is-active {
            background: var(--zayne-color-base-200);
            border-color: var(--zayne-color-base-border);
        }

        .zayne-theme-picker-swatch {
            display: inline-flex;
            align-items: center;
            justify-content: center;

            width: 18px;
            height: 18px;
            flex-shrink: 0;

            border: 1px solid var(--zayne-color-base-border);
            border-radius: 5px;

            overflow: hidden;
            background: var(--zayne-color-base-100);
        }

        .zayne-theme-picker-swatch-accent {
            width: 7px;
            height: 7px;
            border-radius: 2px;
        }

        .zayne-theme-picker-swatch-dark {
            background: #171717;
        }

        .zayne-theme-picker-swatch-light {
            background: #fafafa;
        }

        .zayne-theme-picker-label {
            flex: 1;
            min-width: 0;

            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .zayne-theme-picker-style {
            flex-shrink: 0;

            font-size: 0.6rem;
            opacity: 0.45;
        }
    </style>
@endonce

<div
    class="zayne-theme-picker"
    role="listbox"
    aria-label="Theme"
>
    @foreach ($themeNames as $theme)
        <button
            type="button"
            class="zayne-theme-picker-item"
            data-zayne-theme="{{ $theme['name'] }}"
            role="option"
            aria-selected="false"
            onclick="Zayne.Theme.set('{{ $theme['name'] }}')"
        >
            <span
                class="zayne-theme-picker-swatch zayne-theme-picker-swatch-{{ $theme['mode'] }}"
                aria-hidden="true"
            >
                <span
                    class="zayne-theme-picker-swatch-accent"
                    style="background: {{ $theme['accent'] }};"
                ></span>
            </span>

            <span class="zayne-theme-picker-label">
                {{ ucfirst($theme['color']) }}
                {{ ucfirst($theme['mode']) }}
            </span>

            <span class="zayne-theme-picker-style">
                {{ ucfirst($theme['style']) }}
            </span>
        </button>
    @endforeach
</div>

<script>
    (() => {
        function syncZayneThemePicker() {
            const current = localStorage.getItem('zayne-theme');

            document
                .querySelectorAll('[data-zayne-theme]')
                .forEach(button => {
                    const active = button.dataset.zayneTheme === current;

                    button.classList.toggle('is-active', active);
                    button.setAttribute('aria-selected', active ? 'true' : 'false');
                });
        }

        document.addEventListener('zayne-theme-changed', syncZayneThemePicker);

        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', syncZayneThemePicker);
        } else {
            syncZayneThemePicker();
        }
    })();
</script>