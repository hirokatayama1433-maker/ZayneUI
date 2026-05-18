<?php

namespace Zayne\UI\Components\Header;

use Illuminate\View\Component;
use Illuminate\View\View;

class Nav extends Component
{
    public function __construct(
        public string $gap = '0.5rem'
    ) {
    }

    public function render(): View
    {
        return view('zayne::header.nav');
    }
}
