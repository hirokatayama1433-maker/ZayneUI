<?php

namespace Zayne\UI\Components\Sidebar;

use Illuminate\View\Component;
use Illuminate\View\View;

class Navtreeitem extends Component
{
    public function __construct(
        public string $href   = '',
        public bool   $active = false,
    ) {}

    public function render(): View
    {
        return view('zayne::sidebar.navtreeitem');
    }
}