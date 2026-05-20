<?php

namespace Zayne\UI\Components\Layout\Sidebar;

use Illuminate\View\Component;
use Illuminate\View\View;

class Toggle extends Component
{
    public string $classes;

    public function __construct(
        public string $label = 'Collapse',
    ) {
        $this->classes = 'h-[38px] flex items-center w-full rounded-(--zayne-radius-field) cursor-pointer transition-colors duration-150 '
            . 'bg-(--zayne-custom-sidebar-item-bg) text-(--zayne-custom-sidebar-content) hover:bg-(--zayne-custom-sidebar-item-bg-hover) hover:text-(--zayne-custom-sidebar-item-content-hover)';
    }

    public function render(): View
    {
        return view('zayne::layout.sidebar.toggle');
    }
}