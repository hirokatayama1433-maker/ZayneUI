<div
    x-data="{ open: false }"
    class="zayne-header-search"
    style="position:relative; display:inline-flex; align-items:center;"
>
    <button
        type="button"
        @click="open = !open"
        aria-label="Search"
        style="
            display: flex;
            align-items: center;
            justify-content: center;
            width: 38px;
            height: 38px;
            border-radius: {{ $radius }};
            border: none;
            background: transparent;
            cursor: pointer;
            color: var(--zayne-color-base-content);
            opacity: 0.7;
            transition: opacity 150ms ease, background 150ms ease;
        "
        onmouseover="this.style.opacity='1'; this.style.background='var(--zayne-color-base-200)'"
        onmouseout="this.style.opacity='0.7'; this.style.background='transparent'"
    >
        <zayne:icon :name="$icon" size="1.125rem" />
    </button>

    <div
        x-show="open"
        x-cloak
        @click.outside="open = false"
        style="
            position: absolute;
            top: calc(100% + 0.5rem);
            right: 0;
            z-index: var(--zayne-z-dropdown);
            min-width: 280px;
            background: var(--zayne-color-base-100);
            border-radius: var(--zayne-radius-box);
            box-shadow: var(--zayne-shadow);
            padding: 0.75rem;
            box-sizing: border-box;
        "
    >
        <form action="{{ $action ?? '#' }}" method="GET" role="search" style="display:flex; align-items:center; gap:0.5rem; margin:0;">
            <div style="
                flex: 1;
                display: flex;
                align-items: center;
                gap: 0.5rem;
                height: 36px;
                padding: 0 0.75rem;
                border-radius: {{ $radius }};
                border: {{ $border }} solid {{ $bordercolor }};
                background: {{ $background }};
                color: var(--zayne-color-base-content);
                box-sizing: border-box;
            ">
                <zayne:icon :name="$icon" size="0.875rem" style="opacity:0.5; flex-shrink:0;" />
                <input
                    type="text"
                    name="{{ $name }}"
                    value="{{ $value }}"
                    placeholder="{{ $placeholder }}"
                    style="
                        flex: 1;
                        background: transparent;
                        border: none;
                        outline: none;
                        color: inherit;
                        font: inherit;
                        font-size: 0.875rem;
                        min-width: 0;
                    "
                >
                @if($kbd)
                    <kbd style="font-size:0.65rem; padding:0.125rem 0.375rem; border-radius:var(--zayne-radius-selector); border:1px solid var(--zayne-color-base-border); opacity:0.5; flex-shrink:0;">{{ $kbd }}</kbd>
                @endif
            </div>
            <button
                type="submit"
                style="
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    width: 36px;
                    height: 36px;
                    border-radius: {{ $radius }};
                    border: none;
                    background: var(--zayne-color-primary);
                    color: var(--zayne-color-primary-content);
                    cursor: pointer;
                    flex-shrink: 0;
                "
            >
                <zayne:icon :name="$icon" size="0.875rem" />
            </button>
        </form>
    </div>
</div>