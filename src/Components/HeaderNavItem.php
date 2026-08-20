<?php

namespace Zayne\UI\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class HeaderNavitem extends Component
{
    public function __construct(
        public ?string $href   = null,
        public bool    $active = false,
    ) {}

    public function render(): View
    {
        return view('zayne::header-navitem');
    }
}
