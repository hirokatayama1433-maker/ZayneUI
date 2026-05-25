<div style="display:flex; align-items:center; gap:0.5rem; width:100%;" {{ $attributes }}>
    <div style="{{ $style }}; flex:1;">
        <div style="{{ $barStyle }}"></div>
    </div>
    @if($showvalue)
        <span style="font-size:0.75rem; color:var(--zayne-color-base-content); opacity:0.7; white-space:nowrap; flex-shrink:0;">
            {{ $format === 'percent' ? $value . '%' : $value }}
        </span>
    @endif
</div>