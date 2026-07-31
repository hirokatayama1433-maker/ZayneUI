@php
    $dotColors = [
        'primary' => 'var(--zayne-color-primary)',
        'success' => 'var(--zayne-color-success)',
        'danger'  => 'var(--zayne-color-danger)',
        'warning' => 'var(--zayne-color-warning)',
        'info'    => 'var(--zayne-color-info)',
        'base'    => 'var(--zayne-color-base-content)',
    ];
    $dotColor = $dotColors[$color] ?? $dotColors['primary'];
@endphp

<div class="zayne-timeline-item" style="display:flex; gap:1rem; position:relative; padding-bottom:{{ $last ? '0' : '1.5rem' }};">

    {{-- Left column: dot + line --}}
    <div style="display:flex; flex-direction:column; align-items:center; flex-shrink:0; width:1.5rem;">
        {{-- Dot / Icon --}}
        <div style="
            width:1.5rem;
            height:1.5rem;
            border-radius:999px;
            background:{{ $dotColor }};
            display:flex;
            align-items:center;
            justify-content:center;
            flex-shrink:0;
            z-index:1;
            box-shadow: 0 0 0 3px color-mix(in oklch, {{ $dotColor }} 20%, transparent);
        ">
            @if($icon)
                <zayne:icon :name="$icon" size="0.75rem" color="#fff" />
            @elseif(isset($iconslot))
                {{ $iconslot }}
            @endif
        </div>

        {{-- Line --}}
        @if(!$last)
            <div style="flex:1; width:2px; background:var(--zayne-color-base-border); margin-top:0.25rem; border-radius:9999px;"></div>
        @endif
    </div>

    {{-- Right column: content --}}
    <div style="flex:1; min-width:0; padding-top:0.125rem;">
        @if($title || $timestamp)
            <div style="display:flex; align-items:baseline; justify-content:space-between; gap:0.5rem; margin-bottom:0.25rem;">
                @if($title)
                    <span style="font-size:0.9375rem; font-weight:600; color:var(--zayne-color-base-content); line-height:1.3;">{{ $title }}</span>
                @endif
                @if($timestamp)
                    <span style="font-size:0.75rem; color:var(--zayne-color-base-content-muted); white-space:nowrap; flex-shrink:0;">{{ $timestamp }}</span>
                @endif
            </div>
        @endif

        <div style="font-size:0.875rem; line-height:1.6; color:var(--zayne-color-base-content-muted);">
            {{ $slot }}
        </div>
    </div>

</div>
