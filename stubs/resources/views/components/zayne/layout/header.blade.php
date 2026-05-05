<header
    class="zayneheader
        border-{{ $bordercolor }}
        "
    style="
        {{ $margin !== 'null'       ? 'margin: '        . $margin       . ';' : '' }}
        {{ $margintop !== 'null'    ? 'margin-top: '    . $margintop    . ';' : '' }}
        {{ $marginbottom !== 'null' ? 'margin-bottom: ' . $marginbottom . ';' : '' }}
        {{ $marginleft !== 'null'   ? 'margin-left: '   . $marginleft   . ';' : '' }}
        {{ $marginright !== 'null'  ? 'margin-right: '  . $marginright  . ';' : '' }}
        {{ $border !== 'null'       ? 'border-width: '        . $border       . ';' : '' }}
        {{ $bordertop !== 'null'    ? 'border-top-width: '    . $bordertop    . ';' : '' }}
        {{ $borderbottom !== 'null' ? 'border-bottom-width: ' . $borderbottom . ';' : '' }}
        {{ $borderleft !== 'null'   ? 'border-left-width: '   . $borderleft   . ';' : '' }}
        {{ $borderright !== 'null'  ? 'border-right-width: '  . $borderright  . ';' : '' }}
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