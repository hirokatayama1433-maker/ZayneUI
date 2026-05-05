<?php

namespace App\View\Components\Zayne\Layout\Sidebar;

use App\View\Components\Zayne\ZayneComponent;

class Toggle extends ZayneComponent
{
    public string $classes;

    public function __construct(
        public string $label = 'Collapse',
    ) {
        $this->classes = 'h-[38px] flex items-center w-full rounded-(--zayne-radius-field) cursor-pointer transition-colors duration-150 '
            . 'bg-(--zayne-custom-sidebar-item-bg) text-(--zayne-custom-sidebar-content) hover:bg-(--zayne-custom-sidebar-item-bg-hover) hover:text-(--zayne-custom-sidebar-item-content-hover)';
    }

    public function render()
    {
        return view('components.zayne.layout.sidebar.toggle');
    }
}