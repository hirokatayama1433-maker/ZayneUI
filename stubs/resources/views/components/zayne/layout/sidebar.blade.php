{{--
    Sidebar Component Blade View

    This component renders the sidebar structure.
    - Desktop behavior (collapsing/expanding) is managed by sidebar.js using data attributes.
    - Mobile behavior (drawer) is managed by the parent layout's Alpine.js state (e.g., `mobileOpen`)
      and structural CSS in `zayne-layout.css` (e.g., `.zayne-sidebar.is-open` within media queries).
    - Inline styles are used ONLY for Zayne UI props (padding, margin, background, etc.).
      Structural styles (position, display, transitions) belong in zayne-layout.css.
--}}
<aside
    class="zayne-sidebar" {{-- Base class for structural CSS targeting --}}
    data-mode="{{ $mode }}" {{-- For desktop JS interaction --}}
    data-collapse="{{ $collapse }}" {{-- For desktop JS interaction --}}
    style="
        {{-- Inline styles derived from Zayne UI props --}}
        padding:             {{ $padding }};
        margin:              {{ $margin }};
        margin-top:          {{ $margintop }};
        margin-bottom:       {{ $marginbottom }};
        margin-left:         {{ $marginleft }};
        margin-right:        {{ $marginright }};
        border-width:        {{ $border }};
        border-top-width:    {{ $bordertop }};
        border-bottom-width: {{ $borderbottom }};
        border-left-width:   {{ $borderleft }};
        border-right-width:  {{ $borderright }};
        border-color:        {{ $bordercolor }};
        background:          {{ $background }};
        border-radius:       {{ $radius }};
        box-shadow:          {{ $shadow }};
        
        {{-- Basic structural styles that are part of the sidebar's intrinsic layout --}}
        {{-- These should NOT conflict with mobile drawer positioning defined in zayne-layout.css --}}
        display: flex;
        flex-direction: column;
        flex: 1; /* Allows sidebar to take available space within its parent */
        overflow: hidden; /* Prevents content from spilling out */
        gap: 0.5rem; /* Default gap between header/content/footer, adjust as needed */
        position: relative; /* Context for potential absolute positioning of children */
    "
    {{ $attributes }} {{-- Pass through any other attributes --}}
>

    {{-- Header Slot --}}
    @isset($header)
        <div class="zayne-sidebar-header"> {{-- Use structural CSS class if needed --}}
            {{ $header }}
        </div>
    @endisset

    {{-- Main Content Slot --}}
    {{-- The `overflow-y-auto scrollbar-hide` classes suggest custom scroll handling.
         Ensure these are compatible with Zayne UI's CSS file responsibilities.
         If `scrollbar-hide` is a Tailwind class, it needs to be replaced. --}}
    <div
        class="zayne-sidebar-content flex-1 overflow-y-auto scrollbar-hide" {{-- Added structural class --}}
        style="min-height: 0;" {{-- Prevents flex issues --}}
    >
        {{ $slot }}
    </div>

    {{-- Footer Slot --}}
    @isset($footer)
        <div class="zayne-sidebar-footer"> {{-- Use structural CSS class if needed --}}
            {{ $footer }}
        </div>
    @endisset

</aside>

{{-- IMPORTANT: The desktop-specific JavaScript (sidebar.js) should remain separate
     and handle the 'data-mode' and 'data-collapse' attributes for desktop interactions.
     It should NOT interfere with the mobile drawer logic managed by the parent layout's Alpine.js
     and zayne-layout.css. --}}