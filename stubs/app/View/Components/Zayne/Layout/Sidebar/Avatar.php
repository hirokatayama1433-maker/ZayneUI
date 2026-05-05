<?php

namespace App\View\Components\Zayne\Layout\Sidebar;

use App\View\Components\Zayne\ZayneComponent;

class Avatar extends ZayneComponent
{
    public string $classes;

    public function __construct(
        public string  $name    = '',
        public string  $email   = '',
        public string  $src     = '',
        public string  $alt     = '',
        public ?string $href    = null,
    ) {
        $this->classes = 'h-[38px] flex items-center w-full rounded-(--zayne-radius-field) cursor-pointer transition-colors duration-150 '
            . 'text-(--zayne-custom-sidebar-content) hover:text-(--zayne-custom-sidebar-item-content-hover)';
    }

    public function render()
    {
        return view('components.zayne.layout.sidebar.avatar');
    }
}