<?php

namespace Zayne\UI\Components\Layout\Sidebar;

use Illuminate\View\Component;
use Illuminate\View\View;

class Brand extends Component
{
    public function __construct(
        public string  $name   = '',
        public string  $src    = '',
        public string  $alt    = '',
        public ?string $href   = null,
    ) {}

    public function render(): View
    {
        return view('zayne::layout.sidebar.brand');
    }
}