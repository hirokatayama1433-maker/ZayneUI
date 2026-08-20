@php
    $isHorizontal = $direction === 'horizontal';
    $dividerCursor = $isHorizontal ? 'col-resize' : 'row-resize';
    $panelId = 'zayne-panel-' . uniqid();
@endphp

@once
<style>
    .zayne-panel {
        display: flex;
        width: 100%;
        height: 100%;
        overflow: hidden;
        position: relative;
    }

    .zayne-panel-pane {
        overflow: auto;
        flex-shrink: 0;
        position: relative;
        min-width: 0;
        min-height: 0;
    }

    .zayne-panel--resizable .zayne-panel-handle:hover {
        background: color-mix(in oklch, var(--zayne-color-primary) 30%, transparent);
    }

    .zayne-panel--resizable .zayne-panel-handle:active {
        background: color-mix(in oklch, var(--zayne-color-primary) 50%, transparent);
    }

    .zayne-panel-toggle-btn:hover {
        background: color-mix(in oklch, var(--zayne-color-base-content) 8%, transparent);
    }

    .zayne-panel-pane-enter-start { opacity: 0; }
    .zayne-panel-pane-enter-end   { opacity: 1; }
    .zayne-panel-pane-leave-start { opacity: 1; }
    .zayne-panel-pane-leave-end   { opacity: 0; }

    .zayne-panel-pane-enter {
        transition: opacity 200ms ease;
    }

    .zayne-panel-pane-leave {
        transition: opacity 150ms ease;
    }
</style>
@endonce

@once
<script>
    function zaynePanel(direction = 'horizontal') {
        return {
            direction,
            dragging: false,
            startPos: 0,
            startSize: 0,

            startDrag(event) {
                this.dragging = true;

                const primary   = this.$refs.primary;
                const container = this.$refs.container;
                const isH       = this.direction === 'horizontal';

                const touch = event.touches?.[0] ?? event;
                this.startPos  = isH ? touch.clientX : touch.clientY;
                this.startSize = isH ? primary.offsetWidth : primary.offsetHeight;

                const onMove = (e) => {
                    if (!this.dragging) return;
                    const t     = e.touches?.[0] ?? e;
                    const delta = (isH ? t.clientX : t.clientY) - this.startPos;
                    const containerSize = isH ? container.offsetWidth : container.offsetHeight;
                    let newSize = this.startSize + delta;
                    newSize = Math.max(containerSize * 0.1, Math.min(containerSize * 0.9, newSize));
                    primary.style[isH ? 'width' : 'height'] = newSize + 'px';
                };

                const onUp = () => {
                    this.dragging = false;
                    document.removeEventListener('mousemove', onMove);
                    document.removeEventListener('mouseup', onUp);
                    document.removeEventListener('touchmove', onMove);
                    document.removeEventListener('touchend', onUp);
                    document.body.style.cursor     = '';
                    document.body.style.userSelect = '';
                };

                document.addEventListener('mousemove', onMove);
                document.addEventListener('mouseup', onUp);
                document.addEventListener('touchmove', onMove, { passive: false });
                document.addEventListener('touchend', onUp);

                document.body.style.cursor     = isH ? 'col-resize' : 'row-resize';
                document.body.style.userSelect = 'none';
            },
        };
    }

    document.addEventListener('alpine:init', () => {
        Alpine.data('zaynePanel', zaynePanel);
    });
</script>
@endonce


@if($division === 'none')

    {{-- ── Default: single pane ── --}}
    <div class="zayne-panel" style="{{ $style }}" {{ $attributes }}>
        {{ $slot }}
    </div>

@elseif($division === 'fixed')

    {{-- ── Fixed split: two equal panes, static divider ── --}}
    <div class="zayne-panel zayne-panel--fixed" style="{{ $style }}" {{ $attributes }}>
        <div class="zayne-panel-pane zayne-panel-primary" style="{{ $primaryStyle }}">
            @isset($primary){{ $primary }}@endisset
        </div>

        <div
            class="zayne-panel-divider"
            style="
                {{ $isHorizontal ? 'width' : 'height' }}: {{ $dividersize }};
                {{ $isHorizontal ? 'height' : 'width' }}: 100%;
                background: {{ $dividercolor }};
                flex-shrink: 0;
            "
        ></div>

        <div class="zayne-panel-pane zayne-panel-secondary" style="{{ $secondaryStyle }}">
            @isset($secondary){{ $secondary }}@endisset
        </div>
    </div>

@elseif($division === 'resizable')

    {{-- ── Resizable split: drag handle between panes ── --}}
    <div
        class="zayne-panel zayne-panel--resizable"
        style="{{ $style }}"
        x-data="zaynePanel('{{ $isHorizontal ? 'horizontal' : 'vertical' }}')"
        x-ref="container"
        {{ $attributes }}
    >
        <div
            class="zayne-panel-pane zayne-panel-primary"
            x-ref="primary"
            style="flex: none; {{ $isHorizontal ? 'width' : 'height' }}: 50%; overflow: auto; {{ $isHorizontal ? 'min-width: 0;' : 'min-height: 0;' }}"
        >
            @isset($primary){{ $primary }}@endisset
        </div>

        {{-- Drag handle --}}
        <div
            class="zayne-panel-handle"
            style="
                {{ $isHorizontal ? 'width' : 'height' }}: {{ $dividersize }};
                {{ $isHorizontal ? 'height' : 'width' }}: 100%;
                background: {{ $dividercolor }};
                flex-shrink: 0;
                position: relative;
                cursor: {{ $dividerCursor }};
                z-index: 1;
            "
            x-on:mousedown="startDrag($event)"
            x-on:touchstart.prevent="startDrag($event)"
        >
            {{-- Grip widget --}}
            <div
                class="zayne-panel-grip"
                style="
                    position: absolute;
                    {{ $isHorizontal ? 'top: 50%; left: 50%; transform: translate(-50%, -50%);' : 'left: 50%; top: 50%; transform: translate(-50%, -50%);' }}
                    width: {{ $isHorizontal ? '6px' : '24px' }};
                    height: {{ $isHorizontal ? '24px' : '6px' }};
                    border-radius: 3px;
                    background: var(--zayne-color-base-300, #ccc);
                    display: flex;
                    {{ $isHorizontal ? 'flex-direction: column;' : 'flex-direction: row;' }}
                    align-items: center;
                    justify-content: space-evenly;
                    gap: 3px;
                    pointer-events: none;
                "
            >
                @for ($i = 0; $i < 3; $i++)
                    <span style="
                        display: block;
                        {{ $isHorizontal ? 'width: 2px; height: 2px;' : 'width: 2px; height: 2px;' }}
                        border-radius: 50%;
                        background: var(--zayne-color-base-content, #666);
                        opacity: 0.4;
                    "></span>
                @endfor
            </div>
        </div>

        <div
            class="zayne-panel-pane zayne-panel-secondary"
            style="flex: 1 1 0%; overflow: auto; {{ $isHorizontal ? 'min-width: 0;' : 'min-height: 0;' }}"
        >
            @isset($secondary){{ $secondary }}@endisset
        </div>
    </div>

@elseif($division === 'toggleable')

    {{-- ── Toggleable split: button to show/hide secondary pane ── --}}
    <div
        class="zayne-panel zayne-panel--toggleable"
        style="{{ $style }}"
        x-data="{ secondaryOpen: {{ $showsecondary ? 'true' : 'false' }} }"
        {{ $attributes }}
    >
        <div class="zayne-panel-pane zayne-panel-primary" style="{{ $primaryStyle }}">
            @isset($primary){{ $primary }}@endisset
        </div>

        <div
            class="zayne-panel-divider"
            style="
                {{ $isHorizontal ? 'width' : 'height' }}: {{ $dividersize }};
                {{ $isHorizontal ? 'height' : 'width' }}: 100%;
                background: {{ $dividercolor }};
                flex-shrink: 0;
                position: relative;
            "
            x-show="secondaryOpen"
        ></div>

        <div
            class="zayne-panel-pane zayne-panel-secondary"
            style="{{ $secondaryStyle }}"
            x-show="secondaryOpen"
            x-transition:enter="zayne-panel-pane-enter"
            x-transition:enter-start="zayne-panel-pane-enter-start"
            x-transition:enter-end="zayne-panel-pane-enter-end"
            x-transition:leave="zayne-panel-pane-leave"
            x-transition:leave-start="zayne-panel-pane-leave-start"
            x-transition:leave-end="zayne-panel-pane-leave-end"
        >
            @isset($secondary){{ $secondary }}@endisset
        </div>

        {{-- Toggle button, positioned top-right of primary pane --}}
        <button
            class="zayne-panel-toggle-btn"
            type="button"
            style="
                position: absolute;
                top: 0.5rem;
                right: 0.5rem;
                display: inline-flex;
                align-items: center;
                gap: 0.375rem;
                padding: 0.25rem 0.625rem;
                font-size: 0.75rem;
                border-radius: var(--zayne-radius-field, 0.375rem);
                border: 1px solid var(--zayne-color-base-border);
                background: var(--zayne-color-base-100);
                color: var(--zayne-color-base-content);
                cursor: pointer;
                line-height: 1.4;
                z-index: 2;
            "
            x-on:click="secondaryOpen = !secondaryOpen"
        >
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                 style="width:14px;height:14px;opacity:0.7;">
                <rect x="3" y="3" width="18" height="18" rx="2"/><path d="M12 3v18"/>
            </svg>
            {{ $togglelabel ?? 'Preview Panel' }}
        </button>
    </div>

@endif