<div
    class="zaynemain scrollbar-hide"
    style="
        overflow-y: auto;
        overflow-x: hidden;
        {{ $padding    ? 'padding: '    . $padding    . ';' : '' }}
        {{ $margin     ? 'margin: '     . $margin     . ';' : '' }}
        {{ $background ? 'background: ' . $background . ';' : '' }}
    "
    {{ $attributes }}
>
    {{ $slot }}
</div>