@once
<style>
    .zayne-alert {
        display: flex;
        align-items: flex-start;
        gap: 0.625rem;
        padding: 0.75rem 1rem;
        border-radius: var(--zayne-radius-box);
        border: var(--zayne-border-box) solid transparent;
        font-size: 0.875rem;
        line-height: 1.5;
    }

    .zayne-alert-content {
        display: flex;
        flex-direction: column;
        gap: 0.125rem;
        flex: 1;
        min-width: 0;
    }
</style>
@endonce

<div class="zayne-alert" style="{{ $style }}" {{ $attributes }}>
    @isset($iconslot)
        <span class="zayne-alert-icon">{{ $iconslot }}</span>
    @endisset

    <div class="zayne-alert-content">{{ $slot }}</div>

    @isset($trailing)
        <div class="zayne-alert-trailing">{{ $trailing }}</div>
    @endisset
</div>
