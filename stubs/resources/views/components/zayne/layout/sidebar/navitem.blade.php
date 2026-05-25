@php($tag = $href !== null ? 'a' : 'button')

<div
    x-data="zayneTooltip()"
    style="position:relative; overflow:visible;"
>
    <{{ $tag }}
        @if($href) href="{{ $href }}" @endif
        @if($tag === 'button') type="button" @endif
        {{ $attributes->except('class') }}
        style="{{ $baseStyle }}"
        x-ref="trigger"
        x-on:mouseenter="
            if (document.documentElement.classList.contains('sidebar-collapsed')) {
                show($refs.trigger, $refs.panel);
            }
        "
        x-on:mouseleave="hide()"
        @if(!$active)
            onmouseover="this.style.background='{{ $hoverBg }}'; this.style.color='{{ $hoverColor }}';"
            onmouseout="this.style.background='{{ $background ?? 'var(--zayne-custom-sidebar-item-bg)' }}'; this.style.color='{{ $color ?? 'var(--zayne-custom-sidebar-content)' }}';"
        @endif
    >
        @isset($lefticon)
            <div style="width:38px; height:38px; display:flex; justify-content:center; align-items:center; flex-shrink:0;">
                {{ $lefticon }}
            </div>
        @endisset

        <span class="sidebar-label" style="font-size:15px; flex:1; min-width:0; overflow:hidden; text-overflow:ellipsis; text-align:start;">
            {{ $slot }}
        </span>

        @isset($righticon)
            <div class="sidebar-label" style="width:38px; height:38px; display:flex; justify-content:center; align-items:center; flex-shrink:0;">
                {{ $righticon }}
            </div>
        @endisset
    </{{ $tag }}>

    <div
        x-show="open && document.documentElement.classList.contains('sidebar-collapsed')"
        x-cloak
        x-ref="panel"
        x-bind:class="open ? 'zayne-dropdown-enter' : 'zayne-dropdown-leave'"
        data-zayne-placement="right-center"
        style="
            position: fixed;
            z-index: var(--zayne-z-tooltip);
            background: var(--zayne-color-base-200);
            color: var(--zayne-color-base-content);
            padding: 0.25rem 0.625rem;
            border-radius: var(--zayne-radius-field);
            font-size: 0.8rem;
            white-space: nowrap;
            pointer-events: none;
            box-shadow: var(--zayne-shadow);
        "
    >{{ $slot }}</div>
</div>
