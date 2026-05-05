    <div
        class="zaynesidebar"
        data-mode="{{ $mode }}"
        data-collapse="{{ $collapse }}"
    >
        <aside
            class="
                flex 
                flex-col
                border-{{ $bordercolor }}
                bg-(--zayne-custom-sidebar)"
            style="
                {{ $margin !== 'null'       ? 'margin: '        . $margin       . ';' : '' }}
                {{ $margintop !== 'null'    ? 'margin-top: '    . $margintop    . ';' : '' }}
                {{ $marginbottom !== 'null' ? 'margin-bottom: ' . $marginbottom . ';' : '' }}
                {{ $marginleft !== 'null'   ? 'margin-left: '   . $marginleft   . ';' : '' }}
                {{ $marginright !== 'null'  ? 'margin-right: '  . $marginright  . ';' : '' }}
                {{ $border !== 'null'       ? 'border-width: '        . $border       . ';' : '' }}
                {{ $bordertop !== 'null'    ? 'border-top-width: '    . $bordertop    . ';' : '' }}
                {{ $borderbottom !== 'null' ? 'border-bottom-width: ' . $borderbottom . ';' : '' }}
                {{ $borderleft !== 'null'     ? 'border-left-width: '   . $borderleft   . ';' : '' }}
                {{ $borderright !== 'null'  ? 'border-right-width: '  . $borderright  . ';' : '' }}
                padding: {{ $padding }};
                border-radius: {{ $radius }};
                gap: 8px;
                box-shadow: var(--zayne-custom-layout-shadow);
            "
        >
            @isset($header)
                <div class="shrink-0">{{ $header }}</div>
            @endisset

            <div class="flex-1 gap-1 flex flex-col overflow-y-scroll scrollbar-hide">
                {{ $slot }}
            </div>

            @isset($footer) 
                <div class="flex flex-col gap-2">
                    {{ $footer }}

                </div>
            @endisset
        </aside>    
    </div>