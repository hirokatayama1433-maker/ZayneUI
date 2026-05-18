<?php

namespace Zayne\UI\Components\Sidebar;

use Illuminate\View\Component;
use Illuminate\View\View;

class Brand extends Component
{
    public function __construct(
        public string $name = 'Zayne UI',
        public string $href = 'unset'
    ) {
    }

    public function render(): View
    {
        return view('zayne::sidebar.brand');
    }
}
