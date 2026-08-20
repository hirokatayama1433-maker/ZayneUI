@once
<style>
    .zayne-file {
        display: block;
        width: 100%;
        font-size: 0.875rem;
        font-family: inherit;
        color: var(--zayne-color-base-content);
        cursor: pointer;
    }

    .zayne-file::file-selector-button,
    .zayne-file::-webkit-file-upload-button {
        display: inline-flex;
        align-items: center;
        padding: 0 0.875rem;
        height: var(--zayne-size-field);
        font-size: 0.875rem;
        font-family: inherit;
        font-weight: 500;
        background: var(--zayne-color-base-200);
        color: var(--zayne-color-base-content);
        border: none;
        border-radius: var(--zayne-radius-field);
        margin-right: 0.75rem;
        cursor: pointer;
        transition: background 150ms ease;
    }

    .zayne-file:focus::file-selector-button,
    .zayne-file:focus::-webkit-file-upload-button {
        outline: 2px solid var(--zayne-color-primary);
        outline-offset: 2px;
    }
</style>
@endonce

<input
    class="zayne-input zayne-file"
    style="{{ $style }}"
    type="file"
    @if($accept !== null) accept="{{ $accept }}" @endif
    @if($multiple) multiple @endif
    @disabled($disabled)
    {{ $attributes }}
>
