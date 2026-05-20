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
        $this->classes = 'block w-full text-sm px-2 py-1.5 rounded-(--zayne-radius-field) transition-colors duration-150 cursor-pointer '
    . ($active
        ? 'text-(--zayne-custom-sidebar-item-content-active) bg-(--zayne-custom-sidebar-item-bg-active)'
        : 'text-(--zayne-custom-sidebar-content) hover:text-(--zayne-custom-sidebar-item-content-hover) hover:bg-(--zayne-custom-sidebar-item-bg-hover)'
    );
    }

    public function render(): View
    {
        return view('zayne::sidebar.navtreeitem');
    }
}