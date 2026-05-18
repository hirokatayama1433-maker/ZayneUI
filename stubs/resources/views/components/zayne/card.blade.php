<div class="zayne-card" style="{{ $style }}" {{ $attributes }}>
    @isset($header)
        <div class="zayne-card-header">{{ $header }}</div>
    @endisset

    <div class="zayne-card-body">{{ $slot }}</div>

    @isset($footer)
        <div class="zayne-card-footer">{{ $footer }}</div>
    @endisset
</div>
