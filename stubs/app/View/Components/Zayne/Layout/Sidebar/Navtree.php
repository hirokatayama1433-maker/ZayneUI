<?php

namespace App\View\Components\Zayne\Layout\Sidebar;

use App\View\Components\Zayne\ZayneComponent;

class Navtree extends ZayneComponent
{
    public string $classes;

    public function __construct(
        public string $label  = '',
        public bool   $active = false,
    ) {
        $this->classes = 'flex items-center w-full rounded-(--zayne-radius-field) cursor-pointer transition-colors duration-150 '
            . ($active
                ? 'bg-(--zayne-custom-sidebar-item-bg-active) text-(--zayne-custom-sidebar-item-content-active)'
                : 'bg-(--zayne-custom-sidebar-item-bg) text-(--zayne-custom-sidebar-content) hover:bg-(--zayne-custom-sidebar-item-bg-hover) hover:text-(--zayne-custom-sidebar-item-content-hover)'
            );
    }

    public function render()
    {
        return view('components.zayne.layout.sidebar.navtree');
    }
}