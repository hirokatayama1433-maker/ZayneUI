@once
<style>
    .zayne-fieldset {
        display: flex;
        flex-direction: column;
        gap: 0.375rem;
        width: 100%;
    }

    .zayne-fieldset-label {
        font-size: 0.875rem;
        font-weight: 500;
        color: var(--zayne-color-base-content);
    }

    .zayne-fieldset-body {
        display: flex;
        flex-direction: column;
        gap: 0.25rem;
    }

    .zayne-fieldset-hint {
        font-size: 0.75rem;
        color: var(--zayne-color-base-content);
        opacity: 0.6;
    }

    .zayne-fieldset-error {
        font-size: 0.75rem;
        color: var(--zayne-color-danger);
    }
</style>
@endonce

{{-- existing blade HTML below --}}
<fieldset class="zayne-fieldset" {{ $attributes->except(['class', 'style']) }}>
    @if($label !== '')
        <legend class="zayne-fieldset-label">{{ $label }}</legend>
    @endif

    <div class="zayne-fieldset-body">
        {{ $slot }}
    </div>

    @if($hint)
        <div class="zayne-fieldset-hint">{{ $hint }}</div>
    @endif

    @if($error)
        <div class="zayne-fieldset-error">{{ $error }}</div>
    @endif
</fieldset>
