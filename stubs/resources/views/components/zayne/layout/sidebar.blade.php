    <div
    class="zaynesidebar"
    data-mode="{{ $mode }}"
    data-collapse="{{ $collapse }}"
    x-bind:class="{ 'is-open': mobileOpen }"
    >
    
    <aside
    style="
        display: flex;
        flex-direction: column;
        flex: 1;
        overflow: hidden;
        gap: 8px;
        position: relative; 

        margin: {{ $margin }};
        margin-top: {{ $margintop }};
        margin-bottom: {{ $marginbottom }};
        margin-left: {{ $marginleft }};
        margin-right: {{ $marginright }};

        border-width: {{ $border }};
        border-top-width: {{ $bordertop }};
        border-bottom-width: {{ $borderbottom }};
        border-left-width: {{ $borderleft }};
        border-right-width: {{ $borderright }};

        border-color: {{ $bordercolor }};
        background: {{ $background }};

        padding: {{ $padding }};
        border-radius: {{ $radius }};
        box-shadow: {{ $shadow }};
    "
>

@isset($header)
<div class="flex flex-col">
    {{ $header }}
</div>
@endisset

<div
class="flex-1 gap-1 flex flex-col overflow-y-auto scrollbar-hide"
style="min-height: 0;"
onscroll="sidebarScrollCheck(this)"
>
{{ $slot }}
</div>

<div class="sidebar-scroll-indicator pointer-events-none"
    style="
        display: flex;
        justify-content: center;
        align-items: center;
        height: 0;
        overflow: hidden;
        opacity: 0;
        transition: opacity 200ms ease, height 200ms ease;
        flex-shrink: 0;
    ">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
        stroke-linejoin="round"
        style="
            opacity: 0.4;
            animation: sidebar-bounce 1.2s ease-in-out infinite;
            color: var(--zayne-custom-sidebar-content);
        "
    >
    <path d="M6 9l6 6 6-6"/>
</svg>
</div>

@isset($footer)
<div class="flex flex-col gap-2">
    {{ $footer }}
</div>
@endisset

<script>
function sidebarScrollCheck(el) {
    const indicator = el.parentElement.querySelector('.sidebar-scroll-indicator');
    if (!indicator) return;
    const canScroll = el.scrollHeight > el.clientHeight;
    const atBottom  = el.scrollTop + el.clientHeight >= el.scrollHeight - 8;
    const show = canScroll && !atBottom;
    indicator.style.opacity = show ? '1' : '0';
    indicator.style.height  = show ? '20px' : '0';
}

document.addEventListener('DOMContentLoaded', () => {
document.querySelectorAll('.scrollbar-hide').forEach(el => sidebarScrollCheck(el));
});
window.addEventListener('resize', () => {
document.querySelectorAll('.scrollbar-hide').forEach(el => sidebarScrollCheck(el));
});
new MutationObserver(() => {
document.querySelectorAll('.scrollbar-hide').forEach(el => sidebarScrollCheck(el));
}).observe(document.documentElement, { attributeFilter: ['class'] });
</script>

        </aside>    
    </div>