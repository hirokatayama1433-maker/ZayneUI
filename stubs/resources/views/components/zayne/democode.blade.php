@php
    $source = isset($slot) ? trim((string) $slot) : '';
    $preview = $source ? \Illuminate\Support\Facades\Blade::render($source) : '';
@endphp

<div style="
    border: var(--zayne-border-box) solid var(--zayne-color-base-border);
    border-radius: var(--zayne-radius-box);
    overflow: hidden;
">
    {{-- Live preview --}}
    <div style="
        padding: 2rem 1.5rem;
        background: var(--zayne-color-base-100);
        display: flex;
        align-items: center;
        justify-content: center;
        flex-wrap: wrap;
        gap: 0.75rem;
        min-height: 100px;
    ">
        {!! $preview !!}
    </div>

    {{-- Code block --}}
    <div
        x-data="{ copied: false }"
        style="
            position: relative;
            border-top: var(--zayne-border-box) solid var(--zayne-color-base-border);
            background: var(--zayne-color-base-200);
        "
    >
        <pre
            x-ref="codeblock"
            style="
                margin: 0;
                padding: 1.25rem 3rem 1.25rem 1.25rem;
                font-family: 'JetBrains Mono', 'Fira Code', monospace;
                font-size: 0.78rem;
                line-height: 1.7;
                color: var(--zayne-color-base-content);
                opacity: 0.85;
                overflow-x: auto;
                white-space: pre;
            "><code>{{ $source }}</code></pre>

        <button
            x-on:click="
                navigator.clipboard.writeText($refs.codeblock.innerText);
                copied = true;
                setTimeout(() => copied = false, 1800);
            "
            style="
                position: absolute;
                top: 0.65rem;
                right: 0.65rem;
                display: inline-flex;
                align-items: center;
                padding: 0.3rem 0.6rem;
                border-radius: var(--zayne-radius-selector);
                border: var(--zayne-border-box) solid var(--zayne-color-base-border);
                background: var(--zayne-color-base-300);
                color: var(--zayne-color-base-content);
                font-size: 0.7rem;
                font-family: inherit;
                cursor: pointer;
                opacity: 0.7;
                transition: opacity 150ms ease;
            "
            onmouseover="this.style.opacity='1'"
            onmouseout="this.style.opacity='0.7'"
        >
            <span x-show="!copied">Copy</span>
            <span x-show="copied" x-cloak style="color:var(--zayne-color-success);">Copied!</span>
        </button>
    </div>
</div>
