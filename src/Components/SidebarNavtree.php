<?php

namespace Zayne\UI\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class SidebarNavtree extends Component
{
    public string $baseStyle;
    public string $hoverBg;
    public string $hoverColor;
    public string $resolvedLabel;

    public function __construct(
        public string  $label      = '',
        public ?string $name       = null,  // alias for label — use either
        public bool    $active     = false,
        public ?string $background = null,
        public ?string $color      = null,
        public ?string $radius     = null,
        public ?string $icon       = 'square-x',
    ) {
        // name wins if provided, falls back to label
        $this->resolvedLabel = $name ?? $label;

        $bg  = $background ?? ($active ? 'var(--zayne-custom-sidebar-item-bg-active)' : 'var(--zayne-custom-sidebar-item-bg)');
        $fg  = $color      ?? ($active ? 'var(--zayne-custom-sidebar-item-content-active)' : 'var(--zayne-custom-sidebar-content)');
        $rad = $radius     ?? 'var(--zayne-radius-field)';

        $this->baseStyle = "
            height: 36px;
            display: flex;
            align-items: center;
            width: 100%;
            border-radius: {$rad};
            cursor: pointer;
            transition: background 150ms ease, color 150ms ease;
            border: none;
            box-sizing: border-box;
            font-family: inherit;
            padding: 0px;
            background: {$bg};
            color: {$fg};
        ";

        $this->hoverBg    = $background ?? 'var(--zayne-custom-sidebar-item-bg-hover)';
        $this->hoverColor = $color      ?? 'var(--zayne-custom-sidebar-item-content-hover)';
    }

    public function render(): View
    {
        return view('zayne::sidebar-navtree');
    }
}