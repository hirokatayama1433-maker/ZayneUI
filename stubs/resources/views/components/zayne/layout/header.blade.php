<header
class="zayneheader"
    style="
        display: flex;
        flex-direction: row;

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

        padding: {{ $padding }};
        border-radius: {{ $radius }};
        gap: {{ $gap }};

        box-shadow: var(--zayne-custom-layout-shadow);
    "
>
    @isset($left)
        <div class="shrink-0 flex items-center">{{ $left }}</div>
    @endisset

    <div class="flex-1 flex items-center justify-center min-w-0">
        {{ $slot }}
    </div>

    @isset($right)
        <div class="shrink-0 flex items-center">{{ $right }}</div>
    @endisset
</header>   