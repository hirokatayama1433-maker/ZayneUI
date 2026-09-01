<?php

namespace Zayne\UI\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class SidebarNav extends Component
{
    public function __construct(
        public ?string $label = null,
    ) {}

    public function render(): View
    {
        return view('zayne::sidebar-nav');
    }
}