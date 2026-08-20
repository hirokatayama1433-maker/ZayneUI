@php
    $iconTrailing = $attributes->get('icon:trailing');
    $hasLeadingIcon = $icon !== null || isset($iconslot);
    $hasTrailingIcon = $iconTrailing !== null || isset($trailing);

    $trailingControl = match (true) {
        $hasTrailingIcon => 'custom',
        $viewable        => 'viewable',
        $copyable        => 'copyable',
        $clearable       => 'clearable',
        default          => null,
    };

    $isPassword = $type === 'password';
    $isFloat = $label !== null && $labelposition === 'float';

    $inputAttributes = $attributes->except(['class', 'icon', 'icon:trailing']);
@endphp

@once
    <style>
        .zayne-input-wrapper {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            border-style: solid;
            transition: border-color 0.15s ease, box-shadow 0.15s ease;
        }

        .zayne-input-wrapper:focus-within {
            border-color: var(--zayne-input-focus-border, var(--zayne-color-primary));
            box-shadow: 0 0 0 3px color-mix(in oklch, var(--zayne-input-focus-border, var(--zayne-color-primary)) 25%, transparent);
        }

        .zayne-input-wrapper.zayne-input--invalid {
            border-color: var(--zayne-color-danger);
        }

        .zayne-input-wrapper.zayne-input--invalid:focus-within {
            box-shadow: 0 0 0 3px color-mix(in oklch, var(--zayne-color-danger) 25%, transparent);
        }

        .zayne-input {
            flex: 1 1 auto;
            min-width: 0;
            border: none;
            outline: none;
            background: transparent;
            color: inherit;
            font: inherit;
            padding: 0;
            height: 100%;
        }

        /* ── Input icons & actions ── */
        .zayne-input-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            width: 1.25rem;
            height: 1.25rem;
            color: var(--zayne-color-base-content);
            opacity: 0.6;
        }

        .zayne-input-icon svg {
            width: 100%;
            height: 100%;
        }

        .zayne-input-kbd {
            flex-shrink: 0;
            font-size: 0.75rem;
            line-height: 1;
            padding: 0.125rem 0.375rem;
            border-radius: 0.25rem;
            border: 1px solid var(--zayne-color-base-border);
            color: var(--zayne-color-base-content);
            opacity: 0.6;
            font-family: inherit;
        }

        .zayne-input-action {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            width: 1.25rem;
            height: 1.25rem;
            border: none;
            background: transparent;
            padding: 0;
            cursor: pointer;
            color: var(--zayne-color-base-content);
            opacity: 0.6;
            transition: opacity 0.15s ease;
        }

        .zayne-input-action:hover {
            opacity: 1;
        }

        .zayne-input-action svg {
            width: 100%;
            height: 100%;
        }

        /* ── Affixes ── */
        .zayne-input-affix {
            display: flex;
            align-items: center;
            flex-shrink: 0;
            height: 60%;
            font-size: 0.875rem;
            color: var(--zayne-color-base-content);
            opacity: 0.6;
            white-space: nowrap;
        }

        .zayne-input-affix--prefix {
            padding-right: 0.75rem;
            border-right: 1px solid var(--zayne-color-base-border);
        }

        .zayne-input-affix--suffix {
            padding-left: 0.75rem;
            border-left: 1px solid var(--zayne-color-base-border);
        }

        /* ── Float label ── */
        .zayne-input--float {
            position: relative;
        }

        .zayne-input-float-label {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            font-size: 1rem;
            color: var(--zayne-color-base-content);
            opacity: 0.6;
            pointer-events: none;
            background: var(--zayne-color-base-100);
            padding: 0 0.25rem;
            transition: top 0.15s ease, font-size 0.15s ease, opacity 0.15s ease, color 0.15s ease;
        }

        .zayne-input--float .zayne-input:focus ~ .zayne-input-float-label,
        .zayne-input--float .zayne-input:not(:placeholder-shown) ~ .zayne-input-float-label {
            top: 0;
            font-size: 0.75rem;
            opacity: 0.8;
        }

        .zayne-input--float .zayne-input:focus ~ .zayne-input-float-label {
            color: var(--zayne-input-focus-border, var(--zayne-color-primary));
            opacity: 1;
        }

        .zayne-input--float:has(.zayne-input-icon--leading) .zayne-input-float-label {
            left: 2rem;
        }

        /* ── Input size variants ── */
        .zayne-input--xs { font-size: 0.75rem; }
        .zayne-input--xs .zayne-input,
        .zayne-input--xs input.zayne-input { height: 1.5rem; }

        .zayne-input--sm { font-size: 0.8125rem; }
        .zayne-input--sm .zayne-input,
        .zayne-input--sm input.zayne-input { height: 2rem; }

        .zayne-input--md .zayne-input,
        .zayne-input--md input.zayne-input { height: 2.5rem; }

        .zayne-input--lg { font-size: 1rem; }
        .zayne-input--lg .zayne-input,
        .zayne-input--lg input.zayne-input { height: 2.75rem; }
        </style>
@endonce

<div
    class="zayne-input-wrapper zayne-input--{{ $size }}{{ $invalid ? ' zayne-input--invalid' : '' }}{{ $isFloat ? ' zayne-input--float' : '' }}"
    style="{{ $style }}"
    @if($clearable) data-zayne-input-clearable @endif
    @if($copyable) data-zayne-input-copyable @endif
    @if($viewable) data-zayne-input-viewable @endif
>
    @isset($prefix)
        <div class="zayne-input-affix zayne-input-affix--prefix">
            {{ $prefix }}
        </div>
    @endisset

    @if($icon !== null)
        <span class="zayne-input-icon zayne-input-icon--leading">
            <zayne:icon :name="$icon" />
        </span>
    @elseif(isset($iconslot))
        <span class="zayne-input-icon zayne-input-icon--leading">{{ $iconslot }}</span>
    @endif

    <input
        class="zayne-input"
        type="{{ $isPassword && $viewable ? 'password' : $type }}"
        @disabled($disabled)
        @if($readonly) readonly @endif
        @if($value !== null) value="{{ $value }}" @endif
        @if($isFloat)
            placeholder=" "
        @elseif($placeholder !== null)
            placeholder="{{ $placeholder }}"
        @endif
        @if($invalid) aria-invalid="true" @endif
        data-zayne-input-field
        {{ $inputAttributes }}
    >

    @if($isFloat)
        <label class="zayne-input-float-label">{{ $label }}</label>
    @endif

    @if($kbd !== null)
        <kbd class="zayne-input-kbd">{{ $kbd }}</kbd>
    @endif

    @switch($trailingControl)
        @case('custom')
            <span class="zayne-input-icon zayne-input-icon--trailing">
                <zayne:icon :name="$iconTrailing" />
            </span>
            @break

        @case('viewable')
            <button type="button" class="zayne-input-action" data-zayne-input-action="viewable" aria-label="Toggle password visibility">
                <zayne:icon name="eye" data-zayne-icon-show />
                <zayne:icon name="eye-slash" data-zayne-icon-hide style="display:none" />
            </button>
            @break

        @case('copyable')
            <button type="button" class="zayne-input-action" data-zayne-input-action="copyable" aria-label="Copy to clipboard">
                <zayne:icon name="clipboard" data-zayne-icon-copy />
                <zayne:icon name="check" data-zayne-icon-copied style="display:none" />
            </button>
            @break

        @case('clearable')
            <button type="button" class="zayne-input-action" data-zayne-input-action="clearable" aria-label="Clear input">
                <zayne:icon name="x" />
            </button>
            @break
    @endswitch

    @if($trailingControl === null && isset($trailing))
        <span class="zayne-input-icon zayne-input-icon--trailing">{{ $trailing }}</span>
    @endif

    @isset($suffix)
        <div class="zayne-input-affix zayne-input-affix--suffix">
            {{ $suffix }}
        </div>
    @endisset
</div>