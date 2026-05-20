<div
    class="zaynemain"
    style="
        {{ $margin    ? 'margin: '    . $margin    . ';' : '' }}
        {{ $padding   ? 'padding: '   . $padding   . ';' : '' }}
        {{ $background && $background !== 'null' ? 'background: ' . $background . ';' : '' }}
    "
    {{ $attributes }}
>
    {{ $slot }}
</div>