@php 
$uid = 'zayne-main-' . uniqid(); 
@endphp

@once
<style>
    .zaynemain {
        grid-area: main;
        scroll-behavior: smooth;
        overflow: auto;
        min-height: 0;
    }
</style>
@endonce

<style>
    #{{ $uid }}-inner { width: {{ $width }}; height: 100%; }
    @media (max-width: 768px) {
        #{{ $uid }}-inner { width: {{ $mobileWidth }} !important; }
    }
</style>

<div
    class="zaynemain"
    style="
        display: flex;
        flex-direction: column;
        align-items: center;
        position: relative;
        z-index: var(--zayne-z-shell-base);
        overflow-y: auto;
        overflow-x: hidden;
        {{ $padding      ? 'padding: '       . $padding      . ';' : '' }}
        {{ $margin       ? 'margin: '        . $margin       . ';' : '' }}
        {{ $marginleft   ? 'margin-left: '   . $marginleft   . ';' : '' }}
        {{ $marginright  ? 'margin-right: '  . $marginright  . ';' : '' }}
        {{ $margintop    ? 'margin-top: '    . $margintop    . ';' : '' }}
        {{ $marginbottom ? 'margin-bottom: ' . $marginbottom . ';' : '' }}
    "
    {{ $attributes }}
>
    <div id="{{ $uid }}-inner">
        {{ $slot }}
    </div>
</div>