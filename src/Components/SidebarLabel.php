<?php

namespace Zayne\UI\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class SidebarLabel extends Component
{
    public function __construct(
        public string $title = '',
    ) {}

    public function render(): View
    {
        return view('zayne::sidebar-label');
    }
}
