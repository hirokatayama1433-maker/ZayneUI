<div
    class="zaynemain scrollbar-hide"
    style="
        overflow-y: auto;
        overflow-x: hidden;
        {{ $padding         ? 'padding: '       . $padding      . ';' : '' }}
        {{ $margin          ? 'margin: '        . $margin       . ';' : '' }}
        {{ $background      ? 'background: '    . $background   . ';' : '' }}
        {{ $marginleft      ? 'margin-left: '   . $marginleft   . ';' : '' }}
        {{ $marginright     ? 'margin-right: '  . $marginright  . ';' : '' }}
        {{ $margintop       ? 'margin-top: '    . $margintop    . ';' : '' }}
        {{ $marginbottom    ? 'margin-bottom: ' . $marginbottom . ';' : '' }}
    "
    {{ $attributes }}
>
    {{ $slot }}
</div>