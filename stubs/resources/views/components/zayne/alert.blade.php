<div class="zayne-alert" style="{{ $style }}" {{ $attributes }}>
    @isset($iconslot)
        <span class="zayne-alert-icon">{{ $iconslot }}</span>
    @endisset

    <div class="zayne-alert-content">{{ $slot }}</div>

    @isset($trailing)
        <div class="zayne-alert-trailing">{{ $trailing }}</div>
    @endisset
</div>
