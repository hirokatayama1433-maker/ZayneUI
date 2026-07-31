@php
    $positionStyles = [
        'top-left'      => 'top:1rem; left:1rem; align-items:flex-start;',
        'top-center'    => 'top:1rem; left:50%; transform:translateX(-50%); align-items:center;',
        'top-right'     => 'top:1rem; right:1rem; align-items:flex-end;',
        'bottom-left'   => 'bottom:1rem; left:1rem; align-items:flex-start;',
        'bottom-center' => 'bottom:1rem; left:50%; transform:translateX(-50%); align-items:center;',
        'bottom-right'  => 'bottom:1rem; right:1rem; align-items:flex-end;',
    ];
    $posStyle = $positionStyles[$position] ?? $positionStyles['bottom-right'];
    $isTop = str_starts_with($position, 'top');
@endphp

<div
    x-data="zayneToast({ duration: {{ $duration }}, limit: {{ $limit }}, isTop: {{ $isTop ? 'true' : 'false' }} })"
    @zayne-toast.window="add($event.detail)"
    class="zayne-toast-portal"
    style="
        position: fixed;
        z-index: var(--zayne-z-tooltip);
        display: flex;
        flex-direction: {{ $isTop ? 'column' : 'column-reverse' }};
        gap: 0.5rem;
        pointer-events: none;
        width: max-content;
        max-width: min(22rem, calc(100vw - 2rem));
        {{ $posStyle }}
    "
    aria-live="polite"
    aria-atomic="false"
>
    <template x-for="toast in toasts" :key="toast.id">
        <div
            class="zayne-toast"
            x-show="toast.visible"
            x-transition:enter="zayne-toast-enter"
            x-transition:enter-start="zayne-toast-enter-start"
            x-transition:enter-end="zayne-toast-enter-end"
            x-transition:leave="zayne-toast-leave"
            x-transition:leave-start="zayne-toast-leave-start"
            x-transition:leave-end="zayne-toast-leave-end"
            :class="`zayne-toast--${toast.type ?? 'base'}`"
            style="pointer-events: auto;"
        >
            {{-- Icon --}}
            <span class="zayne-toast-icon" x-show="toast.type" x-html="zayneToastIcon(toast.type)"></span>

            {{-- Content --}}
            <div class="zayne-toast-content">
                <p class="zayne-toast-title" x-show="toast.title" x-text="toast.title"></p>
                <p class="zayne-toast-body"  x-show="toast.body"  x-text="toast.body"></p>
            </div>

            {{-- Close --}}
            <button
                type="button"
                class="zayne-toast-close"
                @click="dismiss(toast.id)"
                aria-label="Dismiss"
            >
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round"
                    style="width:0.875rem;height:0.875rem;">
                    <path d="m6 6 12 12M18 6 6 18"/>
                </svg>
            </button>

            {{-- Progress bar --}}
            <div
                class="zayne-toast-progress"
                x-show="toast.duration > 0"
                :style="`animation-duration: ${toast.duration}ms`"
            ></div>
        </div>
    </template>
</div>
