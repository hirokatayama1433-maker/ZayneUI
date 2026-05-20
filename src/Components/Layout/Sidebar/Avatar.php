<?php


namespace Zayne\UI\Components\Sidebar;

use Illuminate\View\Component;
use Illuminate\View\View;

class Avatar extends Component
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

    public function render(): View
    {
        return view('zayne::sidebar.avatar');
    }
}