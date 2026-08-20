@once
<style>
    .zayne-textarea {
        display: block;
        width: 100%;
        padding: 0.625rem 0.75rem;
        font-size: 0.875rem;
        font-family: inherit;
        line-height: 1.5;
        color: var(--zayne-color-base-content);
        background: var(--zayne-color-base-100);
        border: var(--zayne-border-field) solid var(--zayne-color-base-border);
        border-radius: var(--zayne-radius-field);
        resize: vertical;
        min-height: 80px;
        box-sizing: border-box;
        transition: border-color 150ms ease, box-shadow 150ms ease;
    }

    .zayne-textarea:focus {
        outline: none;
        border-color: var(--zayne-color-primary);
        box-shadow: 0 0 0 3px color-mix(in oklch, var(--zayne-color-primary) 20%, transparent);
    }

    .zayne-textarea::placeholder {
        color: var(--zayne-color-base-content);
        opacity: 0.4;
    }

    .zayne-textarea:disabled {
        opacity: 0.5;
        cursor: not-allowed;
        resize: none;
    }
</style>
@endonce

<textarea
    class="zayne-input zayne-textarea"
    style="{{ $style }}"
    @if($placeholder !== null) placeholder="{{ $placeholder }}" @endif
    @disabled($disabled)
    rows="{{ $rows }}"
    {{ $attributes }}
>{{ $value ?? trim($slot) }}</textarea>
