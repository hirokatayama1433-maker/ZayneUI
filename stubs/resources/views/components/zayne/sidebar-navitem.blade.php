@once
<style>
    .zayne-navitem-badge {
        max-width: 20rem;
        overflow: hidden;
        transition: opacity 200ms ease-in-out;
        background: var(--zayne-color-red-500);
    }

    .zayne-navitem-badge-ping {
        position: absolute;
        top: 3px;
        right: 3px;
        width: 7px;
        height: 7px;
        border: 2px solid var(--zayne-custom-sidebar-bg);
        border-radius: 50%;
        background: var(--zayne-color-red-500);
        opacity: 0;
        pointer-events: none;
        transition: opacity 200ms ease-in-out;
    }

    html.sidebar-collapsed .zayne-navitem-badge-full {
        position: absolute;
        top: 3px;
        right: 3px;
        opacity: 0;
    }

    html.sidebar-collapsed .zayne-navitem-badge-ping {
        opacity: 1;
        z-index: 1;
    }
</style>
<script>
    window.zayneTooltip ??= function zayneTooltip() {
        return {
            open: false,
            init() {
                window.addEventListener('zayne:sidebar-toggled', () => {
                    this.open = false;
                });
            },
            show(trigger, panel) {
                this.open = true;
                this.$nextTick(() => zaynePosition(trigger, panel));
            },
            hide() {
                this.open = false;
            },
        };
    };

    document.addEventListener('alpine:init', () => {
        if (typeof Alpine === 'undefined') return;
        Alpine.data('zayneTooltip', window.zayneTooltip);
    });
</script>
@endonce

@php
    $tag = $href !== null ? 'a' : 'button';
@endphp

<div
    x-data="zayneTooltip()"
    @class(['zayne-navitem-no-icon' => !$icon])
    style="position:relative; overflow:visible;"
>
    <{{ $tag }}
        @if($href) href="{{ $href }}" @endif
        @if($tag === 'button') type="button" @endif
        onclick="Zayne.Sidebar.closeMobile()"
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
        {{-- Icon --}}
        @if($icon)
            <div style="width:40px; height:40px; display:flex; justify-content:center; align-items:center; flex-shrink:0;">
                <zayne:icon name="{{ $icon }}" size="18px"/>
            </div>
        @endif

        {{-- Label text — hides on collapse --}}
        <span class="zayne-sb-text" style="font-size:14px; flex:1; min-width:0; overflow:hidden; text-overflow:ellipsis; text-align:start;">
            @if($name !== null)
                {{ $name }}
            @else
                {{ $slot }}
            @endif
        </span>

        {{-- Badge — becomes a ping on collapse --}}
        @if($badge)
            <span
                class="zayne-navitem-badge zayne-navitem-badge-full"
                style="
                    transition: opacity 100ms ease-in-out;
                    flex-shrink:0;
                    font-size:0.65rem;
                    font-weight:600;
                    line-height:1;
                    padding:0.2rem 0.4rem;
                    border-radius:9999px;
                    color:var(--zayne-color-primary-content);
                    margin-right:0.5rem;
                    white-space:nowrap;
                "
            >{{ $badge }}</span>
            <span class="zayne-navitem-badge-ping" aria-hidden="true"></span>
        @endif

        {{-- Optional right-icon slot — hides on collapse --}}
        @isset($righticon)
            <div class="zayne-sb-text" style="width:40px; height:40px; display:flex; justify-content:center; align-items:center; flex-shrink:0;">
                {{ $righticon }}
            </div>
        @endisset
    </{{ $tag }}>

    {{-- Collapsed tooltip --}}
    <div
        x-show="open && document.documentElement.classList.contains('sidebar-collapsed')"
        x-cloak
        x-ref="panel"
        x-bind:class="open ? 'zayne-dropdown-enter' : 'zayne-dropdown-leave'"
        data-zayne-placement="right-center"
        style="
            position: fixed;
            z-index: var(--zayne-z-tooltip);
            background: var(--zayne-color-base-100);
            color: var(--zayne-color-base-content);
            padding: 0.25rem 0.625rem;
            border-radius: var(--zayne-radius-field);
            font-size: 0.8rem;
            white-space: nowrap;
            pointer-events: none;
            box-shadow: var(--zayne-shadow);
        "
    >{{ $name ?? $slot }}</div>
</div>