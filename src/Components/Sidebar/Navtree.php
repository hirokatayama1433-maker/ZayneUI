<?php

namespace Zayne\UI\Components\Sidebar;

use Illuminate\View\Component;
use Illuminate\View\View;

class Navtree extends Component
{
    public function __construct(
        public ?string $title = null
    ) {
    }

    public function render(): View
    {
        return view('zayne::sidebar.navtree');
    }
}
