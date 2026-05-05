<?php

namespace App\View\Components\Zayne\Layout\Sidebar;

use App\View\Components\Zayne\ZayneComponent;

class Label extends ZayneComponent
{
    public function __construct(
        public string $title = '',
    ) {}

    public function render()
    {
        return view('components.zayne.layout.sidebar.label');
    }
}