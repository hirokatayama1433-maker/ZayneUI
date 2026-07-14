@php($tag = $href ? 'a' : 'button')

<{{ $tag }}
    @if($href) href="{{ $href }}" @endif
    @if($tag === 'button') type="button" @endif
    {{ $attributes->except('class') }}
    style="{{ $baseStyle }}"
    onmouseover="this.style.color='var(--zayne-custom-sidebar-item-content-hover)';"
    onmouseout="this.style.color='var(--zayne-custom-sidebar-content)';"
>
    <div style="flex-shrink:0; width:38px; height:38px; display:flex; justify-content:center; align-items:center;">
        @if($src)
            <img
                src="{{ $src }}"
                alt="{{ $alt ?: $name }}"
                style="width:38px   ; height:38px; border-radius:var(--zayne-radius-field); object-fit:cover;"
            />
        @else
            <div style="width:38px; height:38px; border-radius:var(--zayne-radius-field); display:flex; align-items:center; justify-content:center; font-size:0.75rem; font-weight:600; background:var(--zayne-color-accent); color:#fff;">
                {{ collect(explode(' ', trim($name)))->map(fn($w) => strtoupper($w[0] ?? ''))->take(2)->join('') }}
            </div>
        @endif
    </div>

    <div class="sidebar-label" style="display:flex; flex-direction:column; min-width:0; flex:1; text-align:left; padding-left:0.25rem;">
        <span style="font-size:0.875rem; font-weight:500; line-height:1.25; overflow:hidden; text-overflow:ellipsis; white-space:nowrap;">
            {{ $name }}
        </span>
        @if($email)
            <span style="font-size:0.75rem; opacity:0.5; line-height:1.25; overflow:hidden; text-overflow:ellipsis; white-space:nowrap;">
                {{ $email }}
            </span>
        @endif
    </div>

    <div class="sidebar-label" style="flex-shrink:0; display:flex; align-items:center; padding-right:0.5rem; opacity:0.4;">
        @isset($action)
            {{ $action }}
        @else
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor" style="width:1rem; height:1rem;">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
            </svg>
        @endisset
    </div>

</{{ $tag }}>