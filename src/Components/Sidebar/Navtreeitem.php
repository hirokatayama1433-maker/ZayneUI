<?php

namespace Zayne\UI\Components\Sidebar;

use Illuminate\View\Component;
use Illuminate\View\View;

class Navtreeitem extends Component
{
    public string $classes;

    public function __construct(
        public string $href   = '',
        public bool   $active = false,
    ) {
        $this->classes = 'h-[38px] flex items-center w-full rounded-(--zayne-radius-field) cursor-pointer transition-colors duration-150 '
            . ($active
                ? 'text-[var(--zayne-custom-sidebar-item-content-active)] bg-[var(--zayne-custom-sidebar-item-bg-active)]'
                : 'text-(--zayne-custom-sidebar-content) hover:text-[var(--zayne-custom-sidebar-item-content-hover)] hover:bg-[var(--zayne-custom-sidebar-item-bg-hover)]'
            );
    }

    public function render(): View
    {
        return view('zayne::sidebar.navtreeitem');
    }
}
