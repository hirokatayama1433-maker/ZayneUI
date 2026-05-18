<aside
    class="zayne-layout-sidebar-shell"
    style="
        display: flex;
        flex-direction: column;
        gap: {{ $gap }};
        background: {{ $background }};
        padding: {{ $padding }};
        box-shadow: {{ $shadow }};
        border-radius: {{ $radius }};
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
    "
    {{ $attributes }}
>
    @isset($header)
        <div>{{ $header }}</div>
    @endisset

    <div class="zayne-layout-sidebar-body">{{ $slot }}</div>

    @isset($footer)
        <div>{{ $footer }}</div>
    @endisset
</aside>
