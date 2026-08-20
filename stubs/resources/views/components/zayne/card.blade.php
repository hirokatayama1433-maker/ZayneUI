@once
<style>
    .zayne-card {
        background: var(--zayne-color-base-100);
        border-radius: var(--zayne-radius-box);
        border: var(--zayne-border-box) solid var(--zayne-color-base-border);
        overflow: hidden;
    }

    .zayne-card-header {
        margin-bottom: 0;
    }

    .zayne-card-footer {
        margin-top: 0;
    }
</style>
@endonce
<div class="zayne-card" style="{{ $style }}" {{ $attributes }}>
    @isset($header)
        <div class="zayne-card-header">{{ $header }}</div>
    @endisset

    <div class="zayne-card-body">{{ $slot }}</div>

    @isset($footer)
        <div class="zayne-card-footer">{{ $footer }}</div>
    @endisset
</div>
