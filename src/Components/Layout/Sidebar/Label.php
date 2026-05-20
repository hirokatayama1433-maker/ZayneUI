<?php

namespace Zayne\UI\Components\Layout\Sidebar;

use Illuminate\View\Component;
use Illuminate\View\View;

class Label extends Component
{
    public function __construct(
        public string $title = '',
    ) {}

    public function render(): View
    {
        return view('zayne::layout.sidebar.label');
    }
}