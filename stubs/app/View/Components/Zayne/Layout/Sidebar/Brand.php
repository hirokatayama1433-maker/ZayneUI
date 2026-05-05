<?php

namespace App\View\Components\Zayne\Layout\Sidebar;

use App\View\Components\Zayne\ZayneComponent;

class Brand extends ZayneComponent
{
    public function __construct(
        public string  $name   = '',
        public string  $src    = '',
        public string  $alt    = '',
        public ?string $href   = null,
    ) {}

    public function render()
    {
        return view('components.zayne.layout.sidebar.brand');
    }
}