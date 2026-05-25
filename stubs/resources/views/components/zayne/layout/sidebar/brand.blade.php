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

    <button
        type="button"
        onclick="Zayne.Sidebar.toggle()"
        class="sidebar-label"
        style="flex-shrink:0; width:30px; height:30px; display:flex; align-items:center; justify-content:center; border-radius:var(--zayne-radius-field); border:none; background:transparent; cursor:pointer; color:var(--zayne-custom-sidebar-content); opacity:0.4; transition:background 150ms ease, opacity 150ms ease;"
        onmouseover="this.style.background='var(--zayne-custom-sidebar-item-bg-hover)'; this.style.opacity='1';"
        onmouseout="this.style.background='transparent'; this.style.opacity='0.4';"
    >
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke-width="1.5" stroke="currentColor" style="width:16px; height:16px;">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25H12" />
        </svg>
    </button>

</div>
