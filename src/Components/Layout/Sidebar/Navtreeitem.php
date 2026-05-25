<?php

namespace Zayne\UI\Components\Layout\Sidebar;

use Illuminate\View\Component;
use Illuminate\View\View;

class Navtreeitem extends Component
{
    public string $baseStyle;
    public string $hoverBg;
    public string $hoverColor;

    public function __construct(
        public string  $href       = '',
        public bool    $active     = false,
        public ?string $background = null,
        public ?string $color      = null,
        public ?string $radius     = null,
    ) {
        $bg  = $background ?? ($active ? 'var(--zayne-custom-sidebar-item-bg-active)' : 'transparent');
        $fg  = $color      ?? ($active ? 'var(--zayne-custom-sidebar-item-content-active)' : 'var(--zayne-custom-sidebar-content)');
        $rad = $radius     ?? 'var(--zayne-radius-field)';

        $this->baseStyle = "
            display: block;
            width: 100%;
            font-size: 14px;
            padding: 0.375rem 0.5rem;
            border-radius: {$rad};
            transition: background 150ms ease, color 150ms ease;
            cursor: pointer;
            border: none;
            box-sizing: border-box;
            font-family: inherit;
            text-decoration: none;
            text-align: left;
            background: {$bg};
            color: {$fg};
        ";

        $this->hoverBg    = $background ?? 'var(--zayne-custom-sidebar-item-bg-hover)';
        $this->hoverColor = $color      ?? 'var(--zayne-custom-sidebar-item-content-hover)';
    }

    public function render(): View
    {
        return view('zayne::layout.sidebar.navtreeitem');
    }
}