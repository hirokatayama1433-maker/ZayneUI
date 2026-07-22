<?php

namespace Zayne\UI\Components\Layout\Sidebar;

use Illuminate\View\Component;
use Illuminate\View\View;

class Toggle extends Component
{
    public string $baseStyle;

    public function __construct(
        public string $label = 'Collapse',
    ) {
        $this->baseStyle = '
            height: 32px;
            display: flex;
            align-items: center;
            width: 100%;
            border-radius: var(--zayne-radius-field);
            cursor: pointer;
            transition: background 150ms ease, color 150ms ease;
            border: 1px;
            border-style: solid;
            border-color: var(--zayne-color-base-border);
            box-sizing: border-box;
            font-family: inherit;
            padding: 0;
            background: var(--zayne-custom-sidebar-item-bg);
            color: var(--zayne-custom-sidebar-content);
        ';
    }

    public function render(): View
    {
        return view('zayne::layout.sidebar.toggle');
    }
}