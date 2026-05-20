<?php

namespace Zayne\UI\Components\Sidebar;

use Illuminate\View\Component;
use Illuminate\View\View;

class Navtree extends Component
{
    public function __construct(
        public string $label  = '',
        public bool   $active = false,
    ) {}

    public function render(): View
    {
        return view('zayne::sidebar.navtree');
    }
}