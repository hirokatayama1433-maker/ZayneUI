<header
    class="zayneheader"
    style="
        display: flex;
        flex-direction: row;
        position: relative;
        z-index: var(--zayne-z-shell-elevated);
        border-style: solid;
        border-width: 0;
        background: {{ $background }};
        {{ $padding      ? 'padding: '             . $padding      . ';' : '' }}
        {{ $gap          ? 'gap: '                 . $gap          . ';' : '' }}
        {{ $radius       ? 'border-radius: '       . $radius       . ';' : '' }}
        {{ $shadow       ? 'box-shadow: '          . $shadow       . ';' : '' }}
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
        <div style="flex-shrink:0; display:flex; align-items:center;">{{ $left }}</div>
    @endisset

    <div style="flex:1; display:flex; align-items:center; justify-content:center; min-width:0;">
        {{ $slot }}
    </div>

    @isset($right)
        <div style="flex-shrink:0; display:flex; align-items:center;">{{ $right }}</div>
    @endisset
</header>