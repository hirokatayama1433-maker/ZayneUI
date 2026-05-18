<header
    class="zayne-header"
    style="
        background: {{ $background }};
        box-shadow: {{ $shadow }};
        padding: {{ $padding }};
        gap: {{ $gap }};
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
    @isset($left)
        <div class="zayne-header-left">{{ $left }}</div>
    @endisset

    <div class="zayne-header-center">{{ $slot }}</div>

    @isset($right)
        <div class="zayne-header-right">{{ $right }}</div>
    @endisset
</header>
