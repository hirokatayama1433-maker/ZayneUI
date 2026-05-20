<?php

namespace Zayne\UI\Components\Sidebar;

use Illuminate\View\Component;
use Illuminate\View\View;

class Navitem extends Component
{
    public function __construct(
        public ?string $href   = null,
        public bool    $active = false,
    ) {}

    public function render(): View
    {
        return view('zayne::sidebar.navitem');
    }
}