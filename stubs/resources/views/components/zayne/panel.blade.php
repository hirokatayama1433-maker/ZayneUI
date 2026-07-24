@php
    $isHorizontal = $direction === 'horizontal';
    $dividerCursor = $isHorizontal ? 'col-resize' : 'row-resize';
    $panelId = 'zayne-panel-' . uniqid();
@endphp

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