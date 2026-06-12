@php
    $iconTrailing = $attributes->get('icon:trailing');
    $hasLeadingIcon = $icon !== null || isset($iconslot);
    $hasTrailingIcon = $iconTrailing !== null || isset($trailing);

    // viewable forces a trailing eye toggle icon, copyable a copy icon,
    // clearable a clear (x) icon — only one trailing control renders at a time,
    // priority: explicit trailing > viewable > copyable > clearable
    $trailingControl = match (true) {
        $hasTrailingIcon => 'custom',
        $viewable        => 'viewable',
        $copyable        => 'copyable',
        $clearable       => 'clearable',
        default          => null,
    };

    $isPassword = $type === 'password';

    $inputAttributes = $attributes->except(['class', 'icon', 'icon:trailing']);
@endphp

<div
    class="zayne-input-wrapper zayne-input--{{ $size }}{{ $invalid ? ' zayne-input--invalid' : '' }}"
    style="{{ $style }}"
    @if($clearable) data-zayne-input-clearable @endif
    @if($copyable) data-zayne-input-copyable @endif
    @if($viewable) data-zayne-input-viewable @endif
>
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
        @if($placeholder !== null) placeholder="{{ $placeholder }}" @endif
        @if($invalid) aria-invalid="true" @endif
        data-zayne-input-field
        {{ $inputAttributes }}
    >

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
</div>