<?php

namespace App\View\Components\Zayne\Layout\Sidebar;

use App\View\Components\Zayne\ZayneComponent;

class Navitem extends ZayneComponent
{
    public string $classes;

    public function __construct(
        public bool $indent = false,
        public ?string $href     = null,
        public bool    $active   = false,
        public string  $tag      = 'a',
    ) {
        $this->classes = 'h-[38px] flex items-center w-full rounded-(--zayne-radius-field) bg-(--zayne-custom-sidebar-item-bg) cursor-pointer transition-colors duration-150 '
            . ($active
                ? 'bg-[var(--zayne-custom-sidebar-item-bg-active)] text-[var(--zayne-custom-sidebar-item-content-active)]'
                : 'bg-[var(--zayne-custom-sidebar-item-bg)] text-(--zayne-custom-sidebar-content) hover:bg-[var(--zayne-custom-sidebar-item-bg-hover)] hover:text-[var(--zayne-custom-sidebar-item-content-hover)]'
            );
    }

    public function render()
    {
        return view('components.zayne.layout.sidebar.navitem');
    }
}