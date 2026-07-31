<div
    class="zaynemain scrollbar-hide"
    style="
        display: flex;
        flex-direction: column;
        align-items: center;
        position: relative;
        z-index: var(--zayne-z-shell-base);
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
<div 
style="
width: {{ $width }}; height: 100%;">
    {{ $slot }}
</div>
</div>