@php($tag = $href !== null ? 'a' : 'div')

<div style="display:flex; align-items:center; width:100%;">

    <{{ $tag }}
        @if($href) href="{{ $href }}" @endif
        style="display:flex; align-items:center; flex:1; min-width:0; text-decoration:none; color:inherit;"
        onclick="if (document.documentElement.classList.contains('sidebar-collapsed')) { event.preventDefault(); Zayne.Sidebar.expand(); }"
    >
        <div style="flex-shrink:0; width:38px; height:38px; display:flex; justify-content:center; align-items:center;">
            @if($src)
                <img src="{{ $src }}" alt="{{ $alt ?: $name }}" style="width:38px; height:38px; object-fit:contain;" />
            @else
                <div
                    style="width:38px; height:38px; border-radius:var(--zayne-radius-field); display:flex; align-items:center; justify-content:center; font-size:14px; font-weight:700; background:var(--zayne-color-accent); color:#fff; cursor:pointer;"
                >
                    {{ strtoupper($name[0] ?? 'Z') }}
                </div>
            @endif
        </div>

        <span class="sidebar-label" style="padding-left:8px; font-size:14px; font-weight:600; white-space:nowrap; overflow:hidden; text-overflow:ellipsis; color:inherit;">
            {{ $name }}
        </span>
    </{{ $tag }}>

</div>
