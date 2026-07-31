<div class="zayne-callout zayne-callout--{{ $variant }} zayne-callout--{{ $color }}" style="{{ $style }}" {{ $attributes }}>
    <div style="display:flex; gap:0.75rem; align-items:flex-start;">

        @isset($iconslot)
            <span style="flex-shrink:0; color:{{ $iconColor }}; margin-top:0.125rem;">{{ $iconslot }}</span>
        @elseif($icon)
            <span style="flex-shrink:0; color:{{ $iconColor }}; margin-top:0.125rem;">
                <zayne:icon :name="$icon" size="1.125rem" />
            </span>
        @endisset

        <div style="flex:1; min-width:0;">
            @if($title)
                <p style="margin:0 0 0.25rem; font-size:0.9375rem; font-weight:600; line-height:1.4; color:inherit;">{{ $title }}</p>
            @endif

            <div style="font-size:0.875rem; line-height:1.6; color:inherit; opacity:{{ $title ? '0.85' : '1' }};">
                {{ $slot }}
            </div>
        </div>

        @isset($trailing)
            <div style="flex-shrink:0;">{{ $trailing }}</div>
        @endisset

    </div>
</div>
