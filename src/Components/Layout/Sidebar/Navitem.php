<?php

namespace Zayne\UI\Components\Layout\Sidebar;

use Illuminate\View\Component;
use Illuminate\View\View;

class Navitem extends Component
{
    public string $baseStyle;
    public string $activeStyle;
    public string $hoverBg;
    public string $hoverColor;
    public string $accentColor;

    public function __construct(
        public ?string $href       = null,
        public bool    $active     = false,
        public ?string $background = null,
        public ?string $color      = null,
        public ?string $radius     = null,
        public ?string $padding    = null,
        public ?string $accent     = null,
    ) {
        $bg     = $background ?? ($active ? 'var(--zayne-custom-sidebar-item-bg-active)' : 'var(--zayne-custom-sidebar-item-bg)');
        $fg     = $color      ?? ($active ? 'var(--zayne-custom-sidebar-item-content-active)' : 'var(--zayne-custom-sidebar-content)');
        $rad    = $radius     ?? 'var(--zayne-radius-field)';
        $pad    = $padding    ?? '0px';

        $this->accentColor = $accent ?? 'var(--zayne-color-primary)';

        $this->baseStyle = "
            height: 36px;
            display: flex;
            align-items: center;
            width: 100%;
            border-radius: {$rad};
            cursor: pointer;
            transition: background 150ms ease, color 150ms ease;
            text-decoration: none;
            border: none;
            box-sizing: border-box;
            font-family: inherit;
            padding: {$pad};
            background: {$bg};
            color: {$fg};
        ";

        $this->activeStyle = '';

        $this->hoverBg    = $background ?? 'var(--zayne-custom-sidebar-item-bg-hover)';
        $this->hoverColor = $color      ?? 'var(--zayne-custom-sidebar-item-content-hover)';
    }

    public function render(): View
    {
        return view('zayne::layout.sidebar.navitem');
    }
}