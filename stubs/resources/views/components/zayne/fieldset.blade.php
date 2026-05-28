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
