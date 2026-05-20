<?php

namespace Zayne\UI\Components\Sidebar;

use Illuminate\View\Component;
use Illuminate\View\View;

class Navtree extends Component
{
    public string $classes;

    public function __construct(
        public string $label  = '',
        public bool   $active = false,
    ) {
        $this->classes = 'h-[38px] flex items-center w-full rounded-(--zayne-radius-field) cursor-pointer transition-colors duration-150 '
            . ($active
                ? 'bg-[var(--zayne-custom-sidebar-item-bg-active)] text-[var(--zayne-custom-sidebar-item-content-active)]'
                : 'bg-[var(--zayne-custom-sidebar-item-bg)] text-(--zayne-custom-sidebar-content) hover:bg-[var(--zayne-custom-sidebar-item-bg-hover)] hover:text-[var(--zayne-custom-sidebar-item-content-hover)]'
            );
    }

    public function render(): View
    {
        return view('zayne::sidebar.navtree');
    }
}
