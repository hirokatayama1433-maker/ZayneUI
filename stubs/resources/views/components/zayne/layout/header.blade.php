<header
    class="zayneheader"
    style="
        background: {{ $background }};
        {{ $shadow       ? 'box-shadow: '          . $shadow       . ';' : '' }}
        {{ $padding      ? 'padding: '             . $padding      . ';' : '' }}
        {{ $gap          ? 'gap: '                 . $gap          . ';' : '' }}
        {{ $margin       ? 'margin: '              . $margin       . ';' : '' }}
        {{ $margintop    ? 'margin-top: '          . $margintop    . ';' : '' }}
        {{ $marginbottom ? 'margin-bottom: '       . $marginbottom . ';' : '' }}
        {{ $marginleft   ? 'margin-left: '         . $marginleft   . ';' : '' }}
        {{ $marginright  ? 'margin-right: '        . $marginright  . ';' : '' }}
        {{ $border       ? 'border-width: '        . $border       . ';' : '' }}
        {{ $bordertop    ? 'border-top-width: '    . $bordertop    . ';' : '' }}
        {{ $borderbottom ? 'border-bottom-width: ' . $borderbottom . ';' : '' }}
        {{ $borderleft   ? 'border-left-width: '   . $borderleft   . ';' : '' }}
        {{ $borderright  ? 'border-right-width: '  . $borderright  . ';' : '' }}
        {{ $bordercolor  ? 'border-color: '        . $bordercolor  . ';' : '' }}
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