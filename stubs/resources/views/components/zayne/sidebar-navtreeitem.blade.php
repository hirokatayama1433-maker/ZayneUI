@once
<script>
    window.zayneTooltip ??= function zayneTooltip() {
        return {
            open: false,
            init() {
                window.addEventListener('zayne:sidebar-toggled', () => {
                    this.open = false;
                });
            },
            show(trigger, panel) {
                this.open = true;
                this.$nextTick(() => zaynePosition(trigger, panel));
            },
            hide() {
                this.open = false;
            },
        };
    };

    document.addEventListener('alpine:init', () => {
        if (typeof Alpine === 'undefined') return;
        Alpine.data('zayneTooltip', window.zayneTooltip);
    });
</script>
@endonce

@php($tag = $href !== '' ? 'a' : 'button')
@once
    <style>
            .navtree-items {
                position: relative;
                overflow: hidden;
                opacity: 0;
                transition: max-height 300ms cubic-bezier(0.4, 0, 0.2, 1), opacity 150ms ease;
            }

            .zaynenavtree.navtree-open .navtree-items {
                opacity: 1;
            }
            
      </style>
@endonce
<{{ $tag }}
    @if($href !== '') href="{{ $href }}" @endif
    @if($tag === 'button') type="button" @endif
    onclick="Zayne.Sidebar.closeMobile()"
    {{ $attributes->except('class') }}
    style="{{ $baseStyle }}"
    @if(!$active)
        onmouseover="this.style.background='{{ $hoverBg }}'; this.style.color='{{ $hoverColor }}';"
        onmouseout="this.style.background='{{ $background ?? 'transparent' }}'; this.style.color='{{ $color ?? 'var(--zayne-custom-sidebar-content)' }}';"
    @endif
>{{ $slot }}</{{ $tag }}>
